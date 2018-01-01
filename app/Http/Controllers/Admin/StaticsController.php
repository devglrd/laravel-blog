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

            //COUNT
            $countUsers = $this->countMember();
            $countUserConfirm = $this->countMemberConfirm();
            $countPosts = $this->countPost();
            $countPostsConfirm = $this->countPostConfirm();
            $countCategories = $this->countCategories();
            $countCategoriesConfirm = $this->countCategoriesConfirm();


            //DATA

            $users = $this->getAllMember();
            $posts = $this->getALlPost();
            $categories = $this->getAllCategorie();

            return view(self::PATH_VIEW . 'dashboard')->with([
                'title'                 => 'Dashboard',
                'users'                 => $users,
                'posts'                 => $posts,
                'categories'            => $categories,
                'countUsers'            => $countUsers,
                'countUsersConfirm'     => $countUserConfirm,
                'countPosts'            => $countPosts,
                'countPostsConfirm'     => $countPostsConfirm,
                'countCategories'       => $countCategories,
                'countCategoriesConfirm'=> $countCategoriesConfirm
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

    public function confirmPost($slug)
    {
        Post::where('slug', $slug)->update([
           'is_confirm' => 1
        ]);
        return redirect()->back();
    }

    public function countPost()
    {
        $posts = Post::all()->count();
        return $posts;
    }
    public function countPostConfirm()
    {
        $posts = Post::where('is_confirm', '>', '0')->get()->count();
        return $posts;
    }
    public function countCategories()
    {
        $categories = Categorie::all()->count();
        return $categories;
    }
    public function countCategoriesConfirm()
    {
        $categories = Categorie::where('is_confirm', '>', '0')->get()->count();
        return $categories;
    }
    public function countMember()
    {
        $users = User::all()->count();
        return $users;
    }
    public function countMemberConfirm()
    {
        $users = User::where('fk_role', '>', '1')->get()->count();
        return $users;
    }

}

