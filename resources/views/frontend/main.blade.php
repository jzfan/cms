<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->
  <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../../favicon.ico">

    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

  <!-- CSS Global Compulsory -->

  </head>

  <body>
    <main>
    @yield('content')

    </main>

    <script src="{{ asset('js/all.js') }}"></script>

  <!-- JS Plugins Init. -->
  <script>
    // initialization of google map
    function initMap() {
      $.HSCore.components.HSGMap.init('.js-g-map');
    }

    $(document).on('ready', function () {
      // initialization of carousel
      $.HSCore.components.HSCarousel.init('.js-carousel');

      // initialization of go to section
      $.HSCore.components.HSGoTo.init('.js-go-to');

      // initialization of header
      $.HSCore.components.HSHeader.init($('#js-header'));
      $.HSCore.helpers.HSHamburgers.init('.hamburger');
    });

    $(window).on('load', function () {
      // initialization of HSScrollNav
      $.HSCore.components.HSScrollNav.init($('#js-scroll-nav'), {
        duration: 700
      });
    });
  </script>

  </body>
</html>