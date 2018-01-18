<?php

namespace App\Http\Controllers\App;

use App\Categorie;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StaticsController extends Controller
{
    const PATH_VIEW = 'app.entities.static.';
    const POST_VIEW = 'app.entities.static.posts.';
    const PATH_ACCOUNT = 'app.entities.static.account.';
    const CATEGORIE_VIEW = 'app.entities.static.categories.';
    const PATH_CONTROLLER = 'App\StaticsController@';
    const COMMENT_VIEW = 'app.entities.static.comments.';

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
        $comments = $this->getCommentByPost($post->id);
        return view(self::POST_VIEW . 'show')->with([
           'post' => $post,
            'comments' => $comments
        ]);
    }
    public function postComment(Request $request, $id)
    {
        //ici on enregistre notre commentaire
        // on est pas co donc nique
        if (!empty($request)){
            Comment::create([
                'content' => $request->get('comment'),
                'fk_post_id' => $id,
                'fk_user_id' => Auth::user()->id
            ]);
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function showFormUpdateComment($id)
    {
        $comment = Comment::where('id', $id)->first();
        return view(self::COMMENT_VIEW . 'create')->with([
            'comment' => $comment
        ]);
    }

    public function postUpdateComment(Request $request, $id)
    {

        $comment = Comment::where('id', $id)->first();
        $post = Post::where('id', $comment->fk_post_id)->first();
        //c'est super moche je devrais faire ça avec les relations mais nique
        Comment::where('id', $id)->update([
            'content' => $request->get('comment')
        ]);

        return redirect()->action('App\StaticsController@showPost', $post->slug);
    }
    public function showPostByCategorie($slug)
    {
        $postByCategorie = Categorie::where('slug', $slug)->first();
        $widget = $this->getWidget();
        return view(self::CATEGORIE_VIEW . 'show')->with([
            'categorie' => $postByCategorie,
            'categories' => $widget
        ]);
    }

    public function showAccount($name)
    {
        $user = $this->getUser($name);
        return view(self::PATH_ACCOUNT . 'show')->with([
            'user' => $user
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
