<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    .card-header {
        background-color: #6c757d;
        color: #fff;
    }

    .card-footer {
        background-color: transparent;
    }

    </style>
</head>

<body>
    <div id="app">
        @auth
        @include('layouts.nav')
        @include('layouts.notice')
        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-2 d-lg-block d-none">
                        @include('layouts.menu')
                    </div>
                    <div class="col-12 col-lg-10">
                        <div class="d-block d-lg-none mb-2">
                            @include('layouts.menu-hidden')
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
        @else
        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
        @endauth
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
    const nav = getNav()

    toggleActiveNav()
    // console.log(nav)

    function getNav() {
        return window.location.pathname.split('/').slice(0, 3).join('/')
    }

    function toggleActiveNav() {
        $('nav > .nav-link').removeClass('active')
        $(`nav > .nav-link[href='${nav}']`).addClass('active')

    }

    function showErrors() {
        let errors = JSON.parse($('#errors').val())
        for (item in errors) {
            $(`[name='${item}']`).addClass('is-invalid')
            for (message of errors[item]) {
                $(`[name='${item}']`).after(`<div class="invalid-feedback">${message}</div>`)
            }
        }
    }

    function deleteTr(btn) {
        if (confirm('确定删除？')) {
            let tr = btn.parents('tr')
            let id = tr.data('id')
            axios.delete(`/admin/users/${id}`)
                .then(res => {
                    if (res.data === 'ok') {
                        tr.hide('slow')
                    }
                })
        }
    }

    function flash(message) {
        $('#notice-div').show()
            .find('.alert').html(message)
        setTimeout(() => {
            $('#notice-div').hide('slow')
        }, 3000)
    }

    </script>
    @stack('js')
</body>

</html>
