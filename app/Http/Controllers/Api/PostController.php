<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::select('title', 'subtitle', 'content', 'author', 'pub_date', 'id', 'image')->get();
        $posts->map(function ($post) {
           $post->tags = $post->tags()->pluck('name')->toArray();
        });
        $res = [
            'posts' => $posts,
            'success' => true
        ];
        return response()->json($res);
    }
}
