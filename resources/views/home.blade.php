@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- div.main-post -->
        <div class="main-post">
            <a href="">
                <!-- div.post-header -->
                <div class="post-header">
                    <h1 class="text-center title-font">Titolo centrato</h1>
                    <h4 class="text-right">Nome autore</h4>
                </div>
                <!-- END div.post-header -->
                <!-- div.post-content -->
                <div class="post-content">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam eaque maiores debitis non sequi
                        explicabo consequatur aspernatur culpa iusto nemo necessitatibus, et quibusdam! Sit exercitationem
                        eius enim perferendis laudantium quae.</p>
                </div>
                <!-- END div.post-content -->
            </a>
        </div>
        <!-- END div.main-post -->

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
