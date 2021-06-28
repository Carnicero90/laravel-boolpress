@extends('layouts.app')

@section('content')
    <div class="card" style="width: 80%">
        <div class="card-body">

            @isset($post->categories)
                <p class="card-text">Categoria: {{ $post->categories->name }}</p>
            @endisset

            @if ($post->tags)
                {{-- todo: cambia parametro --}}
                <p class="mb-1">Tags:</p>
                @foreach ($post->tags as $tag)
                    <span>{{ $tag->name }}</span>
                @endforeach

            @endif
            <h1 class="card-title shadow-sm">Titolo: <br> {{ $post->title }}</h1>
            <h2 class="card-title shadow-sm">Sottotitolo: <br> {{ $post->subtitle ? $post->subtitle : 'vuoto' }}</h2>
            <h6 class="card-subtitle mb-2 text-muted">Autore: {{ $post->author }}</h6>
            <p>{{ $post->pub_date }}</p>
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">

            <p class="card-text">{{ $post->content }}</p>
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
@endsection
