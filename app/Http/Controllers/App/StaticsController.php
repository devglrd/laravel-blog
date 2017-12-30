<?php

namespace App\Http\Controllers\App;

use App\Categorie;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StaticsController extends Controller
{
    const PATH_VIEW = 'app.entities.static.';

    public function index()
    {

        $posts = $this->getALlPost();
        $categories = $this->getAllCategorie();
        return view(self::PATH_VIEW . 'index')->with([
            'title'      => 'Home',
            'posts'      => $posts,
            'categories' => $categories
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->back();
    }

}
