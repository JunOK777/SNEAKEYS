<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SNECKEYS</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="height: 80px;">
            <div class="container">
                    <div class="side-flex col-md-4 align-items-center">
                      <form class="search-form" action="{{ route('search') }}" method="get">
                        <input class="search-box" type="text" name="keyword" placeholder="検索ワードを入力">
                        <button class="search-button" type="submit"><i class="fas fa-search"></i></button>
                      </form>
                    </div>
                    <div class="col-md-4 container-center">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            
                            <img src="{{ asset('storage/logo/logo01.png') }}">
                        </a>
                    </div>
                    <div class="col-md-4">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                    <li class="nav-item">
                                        @if (Route::has('register'))
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        @endif
                                    </li>
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
                                         <input id="userId" type="hidden" value="{{ Auth::user()->id }}">

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('mypage') }}">マイページ</a>
                                            <a class="dropdown-item" href="{{ route('contact') }}">お問い合わせ</a>
                                            <a class="dropdown-item" href="{{ route('report') }}">削除依頼</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('ログアウト') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
            </div>
        </nav>

        <main class="py-4">
            

            @if(isset($sidebar) && $sidebar == true)
                <div class="wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-xs-12">
                                @yield('content')
                            </div>

                            <!-- sidebar -->
                            @isset($sidebar)
                                <div class="col-md-3 col-xs-12">
                                  @include('components.sideBar')
                                </div>
                            @endisset
                        </div>
                    </div>
                </div>
            @else
                <div class="wrapper">

                                @yield('content')

                </div>
            @endif
        </main>
    <footer class="footer">
        <div class="footer-container">
            <div class="sns-icons">
                <div class="sns-icon">
                    <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter-square fa-2x"></i></a>
                </div>
                <div class="sns-icon">
                    <p><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-2x"></i></a></p>
                </div>
            </div>
            <p class="copylights">
                All copyrights reserved © 2018 - <a href="/">SNECKEYS</a>
            </p>
        </div>
    </footer>
    </div>

@yield('js')
</body>
</html>
