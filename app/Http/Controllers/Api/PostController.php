<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{   /**
    * Return a listing of the resource.
    *
    * @return \Illuminate\Http\Response //TODO: chiedi per sto valore di ritorno
    */
    public function index()
    {
        $posts = Post::select($this->visibleCols())->get();
        $posts->map(function ($post) {
           $post->tags = $post->tags()->pluck('name')->toArray();
        });
        $res = [
            'posts' => $posts,
            'success' => true
        ];
        return response()->json($res);
    }
    protected function visibleCols() {
        return [
            'title', 'subtitle', 'content', 'author', 'pub_date', 'id', 'image'
        ];
    }
}
