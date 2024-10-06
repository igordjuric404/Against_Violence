<?php

namespace App\Http\Controllers;

use App\Models\AnonymousPost;
use App\Models\Comment;
use App\Models\IpAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnonymousPostController extends Controller
{
    public function list()
    {
        $posts = AnonymousPost::orderBy('publish', 'asc')->get();
        return view('post.list',[
            'title'=>'Postovi',
            'posts'=>$posts
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id=null)
    {
        $post=AnonymousPost::find($id);
        if(!$post) return abort(404);
        foreach ($post->comments as $comment) {
            foreach ($comment->children as $child) {
                $child->likedComments()->detach();
                $child->dislikedComments()->detach();
                $child->delete();
            }
            $comment->likedComments()->detach();
            $comment->dislikedComments()->detach();
            $comment->delete();
        }

        $post->likedPosts()->detach();
        $post->dislikedPosts()->detach();
    
        $post->delete();
    
        return redirect(route('post.list'));
    }
    public function publish($id=null)
    {
        $post=AnonymousPost::find($id);
        if(!$post) return abort(404);
        $post->publish=1;
        $post->save();

        return redirect(route('post.list'));
    }
    public function unpublish($id=null)
    {
        $post=AnonymousPost::find($id);
        if(!$post) return abort(404);
        $post->publish=0;
        $post->save();
        
        return redirect(route('post.list'));
    }
    public function banIp($id=null) {
        $post=AnonymousPost::find($id);
        if(!$post) return abort(404);
        if ($post->ip_id) {
            $ip_address=IpAddress::find($post->ip_id);
            $ip_address->banned=1;
            $ip_address->save();
        } else {
            
        }
        
        
        return redirect(route('post.list'));
    }

    public function most_liked(){
        $posts = AnonymousPost::where('publish', 1)->orderBy('likes', 'desc')->get();
        return view('post.homepage',[
            'title'=>'Najpopularniji postovi',
            'posts'=>$posts
        ]);
    }
    public function newest(){
        $posts = AnonymousPost::where('publish', 1)->orderBy('created_at', 'desc')->get();
        return view('post.homepage',[
            'title'=>'Najpopularniji postovi',
            'posts'=>$posts
        ]);
    }
    public function create(){
        return view('post.create',[
            'title'=>'Objavi svoje iskustvo'
        ]);
    }
    public function store(Request $request)
    {
        $ip = $request->ip();
        $banned_ip_address = IpAddress::where('ip', $ip)->where('banned', 1)->exists();
        if($banned_ip_address) return abort(404);
        $ip_address = IpAddress::where('ip', $ip)->first();
        if (!empty($ip_address)) {
            $ip_address = new IpAddress();
            $ip_address->ip = $ip;
            $ip_address->save();
        }
        $user = Auth::user();
        if (!$user)return abort(404);
        
        $anonymous_post = new AnonymousPost();
        $anonymous_post->title = $request->title;
        $anonymous_post->content = $request->content;
        $anonymous_post->ip_id = $ip_address->id;
        $anonymous_post->user_id =$user->id;
        $anonymous_post->save();

        return redirect(route('post.most-liked'));
    }
    public function show($id=null){
        $post=AnonymousPost::find($id);
        if(!$post) return abort(404);
        return view('post.show',[
            'title'=>$post->title,
            'post'=>$post
        ]);
    }
    public function like($id = null) {
        $post = AnonymousPost::find($id);
        if (!$post) {
            return abort(404);
        }
    
        $user = Auth::user();
        if (!$user) {
            return abort(404);
        }
    
        DB::transaction(function () use ($post, $user) {
            $existingLike = DB::table('post_likes_dislikes')
                                ->where('post_id', $post->id)
                                ->where('user_id', $user->id)
                                ->where('like', 1)
                                ->lockForUpdate()
                                ->first();
    
            if ($existingLike) {
                return redirect()->back()->with('message', 'Već ste lajkovali ovaj post');
            }
    
            $existingDislike = DB::table('post_likes_dislikes')
                                    ->where('post_id', $post->id)
                                    ->where('user_id', $user->id)
                                    ->where('like', 0)
                                    ->lockForUpdate()
                                    ->first();
    
            if ($existingDislike) {
                DB::table('post_likes_dislikes')
                    ->where('post_id', $post->id)
                    ->where('user_id', $user->id)
                    ->where('like', 0)
                    ->delete();
    
                $post->dislikes -= 1;
            }
    
            DB::table('post_likes_dislikes')->updateOrInsert(
                [
                    'post_id' => $post->id,
                    'user_id' => $user->id
                ],
                [
                    'like' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
    
            $post->likes += 1;
            $post->save();
        });
    
        return redirect()->back()->with('message', 'Post je uspešno lajkovan');
    }
    public function dislike($id = null) {
        $post = AnonymousPost::find($id);
        if (!$post) {
            return abort(404);
        }
    
        $user = Auth::user();
        if (!$user) {
            return abort(404);
        }
    
        DB::transaction(function () use ($post, $user) {
            $existingDislike = DB::table('post_likes_dislikes')
                                    ->where('post_id', $post->id)
                                    ->where('user_id', $user->id)
                                    ->where('like', 0)
                                    ->lockForUpdate()
                                    ->first();
    
            if ($existingDislike) {
                return redirect()->back();
            }
    
            $existingLike = DB::table('post_likes_dislikes')
                                ->where('post_id', $post->id)
                                ->where('user_id', $user->id)
                                ->where('like', 1)
                                ->lockForUpdate()
                                ->first();
    
            if ($existingLike) {
                DB::table('post_likes_dislikes')
                    ->where('post_id', $post->id)
                    ->where('user_id', $user->id)
                    ->where('like', 1)
                    ->delete();
    
                $post->likes -= 1;
            }
    
            DB::table('post_likes_dislikes')->updateOrInsert(
                [
                    'post_id' => $post->id,
                    'user_id' => $user->id
                ],
                [
                    'like' => 0,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
    
            $post->dislikes += 1;
            $post->save();
        });
    
        return redirect()->back();
    }
}
