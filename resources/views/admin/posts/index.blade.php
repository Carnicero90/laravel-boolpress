@extends('layouts.app')
@section('content')
<section class="adm-post-list">
    <h1 class="title">Lista Post</h1>
    @foreach ($posts as $post)
        <div class="card">
            <div class="card-header">
                {{ $post->pub_date }}
            </div>
            <div class="card-body">
                @if ($post->categories)
                <p class="card-text">Categoria: {{$post->categories->name }}</p>
                @endif
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">by: {{ $post->author }}</p>
                <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Vai
                    all'articolo</a>
                <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-success">Modifica</a>
                <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger"
                        onclick="return confirm('Vuoi eliminare definitivamente questo articolo? L\'operazione non potrà essere annullata')"
                        value="cancella articolo">
                </form>
            </div>
        </div>
    @endforeach
</section>
@endsection