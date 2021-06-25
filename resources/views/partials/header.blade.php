<header>
    <nav class="navbar navbar-expand-md navbar-light bg-c-1 shadow-sm">
        <div class="container">
            <a class="title-font big" href="{{ url('/') }}">
                {{ strtoupper(config('app.name')) }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.posts.index') }}">
                                    Admin-Panel
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

            </div>

        </div>
    </nav>
    <ul class="nav cats bg-c-2">
        @foreach (config('categories') as $cat)
            {{-- TODO: anche qua chiedi a Donato e Simone (o Ale) --}}
            <li class="nav-item {{ Request::is('categories/' . $cat) ? 'active' : '' }}">
                <a href="{{ route('cat', ['slug' => $cat]) }}" class="nav-link">{{ strtoupper($cat) }}</a>
            </li>
        @endforeach
    </ul>
    @auth
        <ul class="nav cats adm bg-c-2">
            <li class="nav-item {{ Request::is('admin/posts/create') ? 'active' : '' }}">
                <a href="{{ route('admin.posts.create') }}" class="nav-link">crea post</a>
            </li>
            <li class="nav-item {{ Request::is('admin/posts') ? 'active' : '' }}">
                <a href="{{ route('admin.posts.index') }}" class="nav-link">elenco post</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('api.posts') }}" {{-- TODO: crea sottopagina per test richieste a proria API --}} class="nav-link">API answer</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.vue-test') }}"
                    class="nav-link {{ Request::is('admin.test.vue') ? 'active' : '' }}">Vue test</a>
            </li>
        </ul>
    @endauth
    @guest
        <div class="banner text-center">
            <div class="container">
                <p> Sconto del 50% sugli abbonamenti a Boolpress, sensazionale!
                </p>
            </div>
        </div>
    @endguest
</header>
