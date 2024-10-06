<?php

namespace App\Http\Controllers;

use App\Models\User;
use Defuse\Crypto\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    public function list(){
        $users = User::all();
        return view('user.list',[
            'title'=>'Korisnici',
            'users'=>$users
        ]);
    }
    public function destroy($id=null){
        $user = User::find($id);
        if (!$user) {
            return abort(404);
        }
        foreach ($user->comments as $comment) {
            foreach ($comment->children as $child) {
                $child->likedComments()->detach();
                $child->dislikedComments()->detach();
                $child->delete();
            }
            $comment->likedComments()->detach();
            $comment->dislikedComments()->detach();
            $comment->delete();
        }
        foreach ($user->posts as $post) {
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
            
            $post->delete();
        }
        $user->delete();
        return redirect()->back();
    }
    public function showEncryptionKeyForm()
    {
        $user=auth()->user();
        if ($user->encryption_key == null) {
            return view('user.encryption-key',[
                'title'=>'Napravi svoj kljuc'
            ]);
        }
        return redirect(route('evidence-file.index'));
    }

    public function setEncryptionKey(Request $request)
    {

        $auth = auth()->user();
        $user = User::find($auth->id);
        $user->encryption_key = Hash::make($request->encryption_key);
        $user->save();

        return redirect()->route('evidence-file.index');
    }
}
