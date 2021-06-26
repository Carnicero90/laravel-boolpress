<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all()
        ->sortBy('inHome');
        // dd(DB::select('SHOW COLUMNS FROM posts'));
 
        return view('guest.posts.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $post = Post::where('slug', '=', $slug)->first();
        if (!$post) {
            abort('404');
        }

        return view('guest.posts.show', compact('post'));
    }
}
