@extends('layouts.app')
@section('head_scripts')
    <!-- axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <!-- vuejs -->
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
@endsection
@section('content')
    <!-- div#root (vue container) -->
    <div id="root">
        <!-- section.post-list -->
        <section class="post-list">
            <section class="post-list">
                <div class="post" v-for="post in posts">
                    {{-- <a href="{{ route('/post', ['slug' => $post->slug]) }}"> --}}
                        <!-- div.post-header -->
                        <div class="post-header">
                            <h2 class="text-center title-font">@{{ post.title }}</h2>
                            <h4 class="text-right">@{{ post.author }}</h4>
                        </div>
                        <!-- END div.post-header -->
                        <!-- div.post-banner -->
                        <div class="post-banner">
                            <img :src="post.image" alt="">
                        </div>
                        <!-- END div.post-banner -->
                        <!-- div.post-content -->
                        <div class="post-content">
                            {{-- TODO: forse mi causa problemi per len < 40? --}}
                            <p>@{{ post.content.slice(0,40) }}... Continua a leggere</p>
                        </div>
                        <!-- END div.post-content -->
                    </a>
                </div>
        </section>
        <!-- END section.post-list -->
    </div>
    <!-- END div#root -->



@endsection
@section('bodyend_scripts')
    <script src="{{ asset('js/vue-test.js') }}"></script>
@endsection
