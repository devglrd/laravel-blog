<?php

namespace App\Http\Controllers\Admin;

use App\Categorie;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StaticsController extends Controller
{
    const PATH_VIEW = 'admin.entities.static.';

    public function dashboard()
    {
        //dd(Auth::user()->getRole->role != 'admin');
        if ($this->isAdmin()) {

            $users = $this->getAllMember();
            $userConfirm = $this->getAllMemberConfirm();
            $postsConfirm = $this->getAllPostConfirm();
            $posts = $this->getALlPost();
            $categories = $this->getAllCategorie();
            $categoriesConfirm = $this->getAllCategorieConfirm();

            return view(self::PATH_VIEW . 'dashboard')->with([
                'title'             => 'Dashboard',
                'users'             => $users,
                'usersConfirm'      => $userConfirm,
                'posts'             => $posts,
                'postsConfirm'      => $postsConfirm,
                'categories'        => $categories,
                'categoriesConfirm' => $categoriesConfirm
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function isAdmin()
    {
        if (Auth::user()->getRole->role != 'Admin') {
            return false;
        } else {
            return true;
        }
    }

}

