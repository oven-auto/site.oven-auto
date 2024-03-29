<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
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
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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

        <main class="py-4 admin" style="min-height: 71vh;">
            
            @section('alert')
                @include('admin.alert.create')
            @show

            <div class=" py-3 area container"><div class="row">
                @yield('content')
            </div></div>

            @include('admin.modal.bigmodal')
            
        </main>

        @section('footer')
            <div class="container-fluid py-4" style="background:#333;min-height: 20vh;color: #ddd;">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <ul>
                                <li><a href="{{route('brands.index')}}">Бренды</a></li>
                                <li><a href="{{route('properties.index')}}">Характеристики</a></li>
                                <li><a href="{{route('colors.index')}}">Цвета</a></li>
                                <li><a href="{{route('options.index')}}">Оборудование</a></li>
                                <li><a href="{{route('motors.index')}}">Агрегаты</a></li>
                                <li><a href="{{route('packs.index')}}">Опции</a></li>
                                <li><a href="{{route('banners.index')}}">Банеры</a></li>
                                <li><a href="{{route('shortcuts.index')}}">Ярлыки</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <li><a href="{{route('marks.index')}}">Модели</a></li>
                            <li><a href="{{route('complects.index')}}">Комплектации</a></li>
                            <li><a href="{{route('cars.index')}}">Автомобили</a></li>
                            <li><a href="{{route('companies.index')}}">Комм. акции</a></li>
                            <li><a href="{{route('credits.index')}}">Кредиты</a></li>
                        </div>
                    </div>
                </div>
        </div>
        @show
    </div>
</body>
</html>
