@extends('layouts.app')
@section('content')
    <!-- error handler -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <!-- form#create -->
        <form id="create" action="{{ route('admin.posts.store') }}" method="post">
            @csrf
            @method('POST')
            <!-- title -->
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>
            <!-- END title -->
            <!-- author -->
            <div class="form-group">
                <label for="author">Autore</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}">
            </div>
            <!-- END author -->
            <!-- pub_date -->
            <div class="form-group">
                <label for="pub_date">Data di pubblicazione</label>
                <input type="date" class="form-control" id="pub_date" name="pub_date"
                    value="{{ old('pub_date') ? old('pub_date') : date('Y-m-d') }}">
            </div>
            <!-- END pub_date -->
            <!-- categories_id -->
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
            <!-- END categories_id -->
            <!-- subtitle -->
            <div class="form-group">
                <label for="subtitle">Sottotitolo</label>
                <textarea name="subtitle" id="subtitle" class="form-control" cols="30"
                    rows="10">{{ old('subtitle') }}</textarea>
            </div>
            <!-- END subtitle -->
            <!-- content -->
            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea name="content" id="content" class="form-control" cols="30"
                    rows="10">{{ old('content') }}</textarea>
            </div>
            <!-- END content -->
            <!-- image -->
            <div class="form-group">
                <label for="image">Immagine</label>
                <input type="text" class="form-control" id="image" name="image" value="{{ old('image') }}">
            </div>
            <!-- END image -->
            <!-- tags -->
            <div class="form-group">
                <p>Tags:</p>
                @foreach ($tags as $tag)
                    <div>
                        <label for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                        <input type="checkbox" name="tags[]" id="tag-{{ $tag->id }}" value="{{ $tag->id }}">
                    </div>
                @endforeach
            </div>
            <!-- END tags -->
            <input type="submit" class="btn btn-primary" value="Invia">
        </form>
        <!-- END form#create -->
    </div>

@endsection
