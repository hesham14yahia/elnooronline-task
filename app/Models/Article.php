<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'body', 'user_id'
    ];

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes_users()
    {
        return $this->belongsToMany(User::class, 'likes', 'article_id', 'user_id');
    }

    public function dislikes_users()
    {
        return $this->belongsToMany(User::class, 'dislikes', 'article_id', 'user_id');
    }

    public function likes_count()
    {
        return $this->likes_users->count();
    }

    public function dislikes_count()
    {
        return $this->dislikes_users->count();
    }
}
