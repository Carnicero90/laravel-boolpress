<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Post;
use App\Tag;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO: rendi unico slug
        $request->validate($this->paramsToValidate());
        $form_data = $request->all();
        $post = new Post();
        $post->fill($form_data);
        $post->slug = Str::slug($post->title);
        $post->save();
        if ($form_data['tags'] && is_array($form_data['tags'])) {

            $post->tags()->sync($form_data['tags']);
        }
        return redirect()->route('admin.posts.show', ['post' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        // dd($post->tags->pluck('name')->toArray());     

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->paramsToValidate());
        $form_data = $request->all();
        $post = Post::find($id);

        if ($form_data['title'] != $post->title) {
            $form_data['slug'] = $this->createUniqueSlug3($form_data['title']);
        }

        if ($form_data['tags']) {
            $post->tags()->sync($form_data['tags']);
        }

        $post->update($form_data);
        $post->save();
        return redirect()->route('admin.posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function paramsToValidate()
    {
        // TODO: aggiornala
        return [
            'title' => 'required|min:3|max:200',
            'author' => 'required|min:2|max:50',
            'content' => 'required',
            'pub_date' => 'required',
            'categories_id' => 'integer|exists:categories,id',
            'tags' => 'exists:tags,id',
            // 'slug' => 'required|unique|min:3|max:120',
            'inHome' => 'unique:posts'
        ];
    }
}
