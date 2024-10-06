<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnonymousPost extends Model
{
    use HasFactory;
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
    public function ipAddress()
    {
        return $this->belongsTo(IpAddress::class, 'ip_id');
    }
    public function likedPosts()
    {
        return $this->belongsToMany(User::class, 'post_likes_dislikes', 'user_id', 'post_id')->wherePivot('like', 1);
    }
    public function dislikedPosts()
    {
        return $this->belongsToMany(User::class, 'post_likes_dislikes', 'user_id', 'post_id')->wherePivot('like', 0);
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
