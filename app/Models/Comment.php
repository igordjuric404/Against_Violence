<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function post()
    {
        return $this->belongsTo(AnonymousPost::class, 'post_id');
    }
    public function ipAddress()
    {
        return $this->belongsTo(IpAddress::class, 'ip_id');
    }
    public function parent(){
        return $this->belongsTo(Comment::class, 'parent_id');
    }
    public function children(){
        return $this->hasMany(Comment::class, 'parent_id');
    }
    public function likedComments()
    {
        return $this->belongsToMany(User::class, 'comment_likes_dislikes', 'user_id', 'comment_id')->wherePivot('like', 1);
    }
    public function dislikedComments()
    {
        return $this->belongsToMany(User::class, 'comment_likes_dislikes', 'user_id', 'comment_id')->wherePivot('like', 0);
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
