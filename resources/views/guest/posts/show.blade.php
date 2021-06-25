@extends('layouts.app')
@section('content')
    <!-- section post.show -->
    <section class="post-show">
        <!-- div.post -->
        <div class="post">
            <!-- div.post-header -->
            <span class="category">#{{ $post->categories->name }}</span>
            <div class="post-header">
                <div class="container">
                    <h1 class="text-center title-font">{{ $post->title }}</h1>
                    <h4 class="text-right">{{ $post->author }}</h4>
                    @if ($post->subtitle)
                        <p class="subtitle">
                            {{ $post->subtitle }}
                        </p>
                    @endif
                </div>
            </div>
            <!-- END div.post-header -->
            <!-- div.post-banner -->
            <div class="post-banner">
                <img src="{{ $post->image }}" alt="">
            </div>
            <!-- END div.post-banner -->
            <div class="container">
                <!-- div.post-content -->

                <div class="post-content">
                    <span class="date">{{ $post->pub_date }}</span>
                    <p>{{ $post->content }}</p>
                </div>
                <div class="more-info">
                    @if ($post->tags->isNotEmpty())
                        <h5>Tags:</h5>
                        <ul>
                            @foreach ($post->tags as $tag)
                                <li>{{ $tag->name }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <p class="reserved text-right">Riproduzione riservata <i class="far fa-registered"></i></p>
                </div>
                <!-- END div.post-content -->

            </div>

        </div>
        <!-- END div.post-header -->
    </section>
    <!-- END section post.show -->


@endsection
