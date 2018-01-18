<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function getPost()
    {
        return $this->belongsTo(Post::class, 'id','fk_post_id');
    }
    public function getAuthor()
    {
        return $this->belongsTo(User::class,'id', 'fk_user_id');
    }
}
