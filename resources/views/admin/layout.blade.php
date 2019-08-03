<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('blog.title') }} 管理后台</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>

{{-- Navigation Bar --}}
@auth
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">

    <div class="container">

        <button class="navbar-toggler p-0 border-0" type="button" data-toggle="collapse" data-target="#navbar-menu"
                aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-menu">

            <ul class="navbar-nav mr-auto">
                    <li @if (Request::is('article*')) class="nav-item active" @else class="nav-item" @endif>
                        <a class="nav-link" href="article">文章</a>
                    </li>
                    <li @if (Request::is('tag*')) class="nav-item active" @else class="nav-item" @endif>
                        <a class="nav-link" href="tag">标签</a>
                    </li>
                    <li @if (Request::is('upload*')) class="nav-item active" @else class="nav-item" @endif>
                        <a class="nav-link" href="upload">上传</a>
                    </li>
            </ul>

            <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="/logout">退出</a>
                        </div>
                    </li>

            </ul>

        </div>
    </div>
</nav>
@endauth
<main class="py-4">
    @yield('content')
</main>

<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')

</body>
</html>