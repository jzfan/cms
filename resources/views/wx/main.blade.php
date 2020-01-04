<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', '文章推荐')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>
img {
    width: 100%;
}
</style>
</head>
<body>
    @yield('content')

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>