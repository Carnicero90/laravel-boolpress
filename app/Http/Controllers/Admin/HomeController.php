<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * redirect to admin.posts.index
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function index()
    {
        return redirect(route('admin.posts.index'));
    }
}
