@extends('layouts.app')
@section('content')

    <!-- section.post-list -->
    <section class="post-list">
        @foreach ($posts as $post)
        <div class="post">
            <a href="{{ route('/post', ['slug' => $post->slug]) }}">
                <!-- div.post-header -->
                <div class="post-header">
                    <h2 class="text-center title-font">{{ $post->title }}</h2>
                    <h4 class="text-right">{{ $post->author }}</h4>
                </div>
                <!-- END div.post-header -->
                <!-- div.post-banner -->
                <div class="post-banner">
                    <img src="{{ $post->image }}" alt="">
                </div>
                <!-- END div.post-banner -->
                <!-- div.post-content -->
                <div class="post-content">
                    {{-- TODO: forse mi causa problemi per len < 40? --}}
                    <p>{{ trim(substr($post->content, 0, 40)) }}... Continua a leggere</p>
                </div>
                <!-- END div.post-content -->
            </a>
        </div>
    @endforeach
    </section>
    <!-- END section.post-list -->

@endsection