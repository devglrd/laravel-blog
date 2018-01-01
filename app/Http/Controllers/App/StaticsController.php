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
    const POST_VIEW = 'app.entities.static.posts.';
    const PATH_CONTROLLER = 'App\StaticsController@';

    public function index()
    {

        $posts = $this->getAllPostConfirm();
        $categories = $this->getAllCategorieConfirm();

        return view(self::PATH_VIEW . 'index')->with([
            'title'      => 'Home',
            'posts'      => $posts,
            'categories' => $categories
        ]);
    }

    public function showPost($slug)
    {
        $post = $this->getOnePost($slug);
        return view(self::POST_VIEW . 'show')->with([
           'post' => $post
        ]);
    }

    public function showPostForm()
    {
        $widget = $this->getWidget();
        $post = New Post();
        $categorie = $this->getAllCategorieConfirm();

        return view(self::POST_VIEW . 'create')->with([
            'categories' => $widget,
            'post' => $post,
            'categories' => $categorie
        ]);
    }

    public function postPost(Request $request)
    {
        if ($request->hasFile('file')){
            //dd($request->file);
        }
        $categorie = $request->categorie[0];
        $request->validate([
            'title' => 'required|string',
            'categorie' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->get('title'),
            'slug' => str_slug($request->get('title')),
            'content' => $request->get('content'),
            'vote'      => 0,
            'url_img' => '750x300',
            'is_confirm' => 0,
            'fk_user' => Auth::user()->id,
            'fk_categorie' => $categorie,
        ]);
         return redirect()->action(self::PATH_CONTROLLER . 'index');
    }

    public function getWidget()
    {
        $widget = $this->getAllCategorieConfirm();
        return $widget;
    }

    public function logout(){
        Auth::logout();
        return redirect()->back();
    }

    public function vote($slug)
    {
        $vote = Post::where('slug', $slug)->first();
        Post::where('slug', $slug)->update([
            'vote' => $vote->vote += 1
        ]);
        return redirect()->action(self::PATH_CONTROLLER . 'showPost', $slug);
    }
}
