@extends('layouts.app')
@section('content')
    {{-- TODO: modificalo --}}
    {{-- error handler --}}
    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    @endif
    <div class="container">
        <form action="{{ route('admin.posts.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="author">Autore</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}">
            </div>
            <div class="form-group">
                <label for="pub_date">Data di pubblicazione</label>
                <input type="date" class="form-control" id="pub_date" name="pub_date"
                    value="{{ old('pub_date') ? old('pub_date') : date('Y-m-d') }}">
            </div>
            <div class="form-group">
                <label for="categories_id">Categoria</label>
                <select name="categories_id" id="categories_id">
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea name="content" id="content" class="form-control" cols="30"
                    rows="10">{{ old('content') }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Immagine</label>
                <input type="text" class="form-control" id="image" name="image" value="{{ old('image') }}">
            </div>
            <div class="form-group">
                <p>Tags:</p>
                @foreach ($tags as $tag)
                    <div>
                        <label for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                        <input type="checkbox" name="tags[]" id="tag-{{ $tag->id }}" value="{{ $tag->id }}">
                    </div>
                @endforeach
            </div>
            <input type="submit" class="btn btn-primary" value="Invia">
        </form>
    </div>

@endsection
