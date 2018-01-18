<?php

namespace App\Http\Controllers\App;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function post($id)
    {
        $post = Post::where('id', $id)->first();

        return response()->json([
            'message'              => 'Product has been added',
            'post' =>   $post,
            'author' => $post->getUser
        ]);
    }

    public function postComment($id, $comment)
    {
        $post = Post::where('id', $id)->first();

        Comment::create([
            'content' => $comment,
            'fk_post_id' => $id,
            'fk_user_id' => Auth::user()->id
        ]);

        $mycomment = Comment::latest()->first();


        return response()->json([
            'message' => 'Comment store !',
            'post' => $post,
            'comment' => [
                'id' => $mycomment->id,
                'fk_user_id' => Auth::user()->id,
                'content' => $comment,
                'fk_post_id' => $id
            ]
        ]);
    }
    public function destroyComment($id)
    {

        Comment::where('id', $id)->delete();

        return response()->json([
            'message' => 'Commentaire supprime !'
        ]);
    }
}
