<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpAddress extends Model
{
    use HasFactory;
    public function comments()
    {
        return $this->hasMany(Comment::class, 'ip_id');
    }
    public function posts()
    {
        return $this->hasMany(AnonymousPost::class, 'ip_id');
    }
}
