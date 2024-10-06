<?php

namespace App\Http\Controllers;

use App\Models\AnonymousPost;
use App\Models\Comment;
use App\Models\IpAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function list()
    {
        $comments = Comment::all();
        return view('comment.list',[
            'title'=>'Komentari',
            'comments'=>$comments
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id=null)
    {
        $comment=Comment::find($id);
        if(!$comment) return abort(404);
        foreach ($comment->children as $child) {
            $child->delete();
        }
        $comment->likedComments()->detach();
        $comment->dislikedComments()->detach();
        $comment->delete();
        
        return redirect(route('comment.list'));
    }
    public function banIp($id=null) {
        $comment=Comment::find($id);
        if(!$comment) return abort(404);
        
        $ip_address=IpAddress::find($comment->ip_id);
        $ip_address->banned=1;
        $ip_address->save();
        
        return redirect(route('comment.list'));
    }
    public function like($id = null) {
        $comment = Comment::find($id);
        if (!$comment) return abort(404);
    
        $user = Auth::user();
        if (!$user) return abort(404);
    
        DB::transaction(function () use ($comment, $user) {
            $existingLike = DB::table('comment_likes_dislikes')
                                ->where('comment_id', $comment->id)
                                ->where('user_id', $user->id)
                                ->where('like', 1)
                                ->lockForUpdate()
                                ->first();
    
            if ($existingLike) return;
    
            $existingDislike = DB::table('comment_likes_dislikes')
                                    ->where('comment_id', $comment->id)
                                    ->where('user_id', $user->id)
                                    ->where('like', 0)
                                    ->lockForUpdate()
                                    ->first();
    
            if ($existingDislike) {
                DB::table('comment_likes_dislikes')
                    ->where('comment_id', $comment->id)
                    ->where('user_id', $user->id)
                    ->where('like', 0)
                    ->delete();
    
                $comment->dislikes -= 1;
            }
    
            DB::table('comment_likes_dislikes')->updateOrInsert([
                    'comment_id' => $comment->id,
                    'user_id' => $user->id
                ],[
                    'like' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
    
            $comment->likes += 1;
            $comment->save();
        });
    
        return redirect()->back();
    }
    public function dislike($id = null) {
        $comment = Comment::find($id);
        if (!$comment) return abort(404);
    
        $user = Auth::user();
        if (!$user)return abort(404);
    
        DB::transaction(function () use ($comment, $user) {
            $existingDislike = DB::table('comment_likes_dislikes')
                                    ->where('comment_id', $comment->id)
                                    ->where('user_id', $user->id)
                                    ->where('like', 0)
                                    ->lockForUpdate()
                                    ->first();
            if ($existingDislike) return;

            $existingLike = DB::table('comment_likes_dislikes')
                                ->where('comment_id', $comment->id)
                                ->where('user_id', $user->id)
                                ->where('like', 1)
                                ->lockForUpdate()
                                ->first();
    
            if ($existingLike) {
                DB::table('comment_likes_dislikes')
                    ->where('comment_id', $comment->id)
                    ->where('user_id', $user->id)
                    ->where('like', 1)
                    ->delete();
    
                $comment->likes -= 1;
            }
    
            DB::table('comment_likes_dislikes')->updateOrInsert([
                    'comment_id' => $comment->id,
                    'user_id' => $user->id
                ],[
                    'like' => 0,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
    
            $comment->dislikes += 1;
            $comment->save();
        });
    
        return redirect()->back();
    }
    public function comment($id=null, Request $request){
        $post=AnonymousPost::find($id);
        if(!$post) return abort(404);
        $user = Auth::user();
        if (!$user) return abort(404);

        $ip = $request->ip();
        $banned_ip_address = IpAddress::where('ip', $ip)->where('banned', 1)->exists();
        if($banned_ip_address) return abort(404);
        $ip_address = IpAddress::where('ip', $ip)->first();
        if (!empty($ip_address)) {
            $ip_address = new IpAddress();
            $ip_address->ip = $ip;
            $ip_address->save();
        }

        $comment= new Comment();
        $comment->content=$request->content;
        $comment->post_id=$post->id;
        $comment->ip_id=$ip_address->id;
        $comment->user_id=$user->id;
        $comment->save();

        return redirect()->back();
    }

    public function reply($id=null, Request $request){
        $parent_comment=Comment::find($id);
        if(!$parent_comment) return abort(404);

        $ip = $request->ip();
        $banned_ip_address = IpAddress::where('ip', $ip)->where('banned', 1)->exists();
        if($banned_ip_address) return abort(404);
        $ip_address = IpAddress::where('ip', $ip)->first();
        if (!$ip_address) {
            $ip_address = new IpAddress();
            $ip_address->ip = $ip;
            $ip_address->save();
        }

        $user = Auth::user();
        if (!$user) {
            return abort(404);
        }

        $child_comment=new Comment();
        $child_comment->parent_id=$parent_comment->id;
        $child_comment->post_id=$parent_comment->post_id;
        $child_comment->content=$request->content;
        $child_comment->ip_id=$ip_address->id;
        $child_comment->user_id=$user->id;
        $child_comment->save();

        return redirect()->back();
    }
}
