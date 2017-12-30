<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Post;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getALlPost()
    {
        $posts = Post::all();
        return $posts;
    }
    public function getAllPostConfirm()
    {
        $posts = Post::where('is_confirm', '>', '0')->get();
        return $posts;
    }
    public function getAllCategorie()
    {
        $categories = Categorie::all();
        return $categories;
    }
    public function getAllCategorieConfirm()
    {
        $categories = Categorie::where('is_confirm', '>', '0')->get();
        return $categories;
    }
    public function getAllMember()
    {
        $users = User::orderBy('name', 'desc')->paginate(25);
        return $users;
    }
    public function getAllMemberConfirm()
    {
        $users = User::where('fk_role', '>', '1')->orderBy('id', 'desc')->Paginate(30);
        return $users;
    }
}
