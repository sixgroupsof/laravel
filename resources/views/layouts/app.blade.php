<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .top {
            float: right;
            padding: 0 5px;
            color: #fff;
            text-decoration: none;
            background-color: #789;
            position: fixed;
            bottom: 10px;
            right: 10px;
        }
    </style>
    @yield('link')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                嚢囊
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                        <li><a class="nav-link" href="{{ route('login') }}">登录</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">注册</a></li>
                    @else
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </li>
                        </ul>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}<span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('daybook') }}">
                                    创建日记薄
                                </a>
                                {{--<a class="dropdown-item" href="{{ route('daybook') }}">--}}
                                {{--我的日记本--}}
                                {{--</a>--}}
                                <a class="dropdown-item" href="{{ route('user') }}">
                                    我的日记
                                </a>

                                <a class="dropdown-item glyphicon glyphicon-cog"
                                   href="{{ route('perfectInformation') }}">
                                    设置
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    登出
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')
    <a class="top" href="javascript:scroll(0,0)">Top</a>
    @yield('footer')

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>
