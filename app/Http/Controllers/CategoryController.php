<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $cat = Category::where('slug', '=', $slug)->first();
        if (!$cat) {
            abort('404');
        }
        $posts= Post::where('categories_id', '=', $cat->id)->get();
       

        return view('guest.categories.show', compact('posts'));
    }
}
