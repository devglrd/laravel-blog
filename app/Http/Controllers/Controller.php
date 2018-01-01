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

        $posts = Post::orderBy('id', 'desc')->paginate(6);
        return $posts;
    }
    public function getAllPostConfirm()
    {
        $posts = Post::where('is_confirm', '>', '0')->orderBy('id', 'desc')->paginate(6);
        return $posts;
    }
    public function getAllCategorie()
    {
        $categories = Categorie::orderBy('id', 'desc')->paginate(6);
        return $categories;
    }
    public function getAllCategorieConfirm()
    {
        $categories = Categorie::where('is_confirm', '>', '0')->orderBy('id', 'desc')->Paginate(6);
        return $categories;
    }

    public function getUser($name)
    {
        $user = User::where('name', $name)->first();
        return $user;
    }
    public function getAllMember()
    {
        $users = User::orderBy('id', 'desc')->paginate(6);
        return $users;
    }
    public function getAllMemberCOnfirm()
    {
        $users = User::where('fk_role', '>', '1')->orderBy('id', 'desc')->Paginate(6);
        return $users;
    }

    public function getOnePost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return $post;
    }
}
