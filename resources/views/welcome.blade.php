<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>JzAdmin</title>
    <style>
    html,
    body {
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links>a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }

    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <button class="btn btn-outline-dark" onclick="window.location='/admin'">
                <i class="iconfont icon-dashboard"></i>后台</button>
            @else
            <button class="btn btn-outline-dark" onclick="window.location='/login'">
                <i class="iconfont icon-login"></i>登录</button>
            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif
        <div class="content">
            <div class="title m-b-md text-primary">
                <span class="text-primary">JzAdmin</span>
            </div>
            <div id="aplayer"></div>
            <div class="links">
                <button class="btn btn-outline-info mx-3"><i class="iconfont icon-file"></i>Doc</button>
                <button class="btn btn-outline-dark mx-3" onclick="window.location='/news'"><i class="iconfont icon-notification"></i>News</button>
                <button class="btn btn-outline-success mx-3"><i class="iconfont icon-file"></i>Blog</button>
                <button class="btn btn-outline-danger mx-3" onclick="window.location='https://github.com/jzfan/admin'"><i class="iconfont icon-github-fill"></i>GitHub</button>
            </div>
        </div>
    </div>
</body>

</html>
