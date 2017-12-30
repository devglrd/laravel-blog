<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';

    protected $guarded = [];

    public function getPost()
    {
        return $this->hasMany(Post::class, 'fk_categorie', 'id');
    }
}
