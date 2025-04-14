<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'parent_id',
        'content',
    ];

    // Relationship to the post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Relationship to the user who made the comment
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship to parent comment
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    // Relationship to child comments (replies)
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->with('replies');
    }
}
