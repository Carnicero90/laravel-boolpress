@extends('layouts.app')
@section('content')

    {{-- error handler --}}
    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    @endif
    <div class="container">
        <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="author">Autore</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $post->author }}">
            </div>
            <div class="form-group">
                <label for="pub_date">Data di pubblicazione</label>
                <input type="date" class="form-control" id="pub_date" name="pub_date" value={{ $post->pub_date }}>
            </div>
            <div class="form-group">
                <label for="image">Immagine</label>
                <img src="{{ $post->image }}" alt="" class="preview">
                <input type="text" class="form-control" id="image" name="image" value="{{ $post->image }}">
            </div>
            {{-- <div class="form-group">
                <label for="inHome">Posizione nella home</label>
                <input type="text" class="form-control" id="inHome" name="inHome" value={{ $post->inHome }}>
            </div> --}}
            <div class="form-group">
                <label for="categories_id">Categoria</label>
                <select name="categories_id" id="categories_id">
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $post->categories_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- input tags --}}
            <div class="form-group">
                <p>Tags:</p>
                @foreach ($tags as $tag)
                    <div>
                        <label for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                        <input type="checkbox" name="tags[]" id="tag-{{ $tag->id }}" value="{{ $tag->id }}"
                            {{ $post->tags->contains($tag) ? 'checked' : '' }}>
                    </div>
                @endforeach
            </div>
            {{-- END  input tags --}}
            <div class="form-group">
                <span>Slug <small>Non modificabile manualmente</small>
                </span>
                <p class="form-control" id="slug" name="slug">{{ $post->slug }}</p>
            </div>
            
    
    
    
            <div class="form-group">
                <label for="subtitle">Sottotitolo</label>
                <textarea name="subtitle" id="subtitle" class="form-control" cols="30"
                    rows="10">{{ $post->subtitle }}</textarea>
            </div>
            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea name="content" id="content" class="form-control" cols="30"
                    rows="10">{{ $post->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>


@endsection
