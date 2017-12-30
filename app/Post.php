<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $guarded = [];

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'fk_user');
    }

    public function getCategorie()
    {
        return $this->hasOne(Categorie::class, 'id', 'fk_categorie');
    }
}
