<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>


        <!-- Styles -->
        <!-- <link href="{{ asset('css/custom.css') }}?{{ $cachePostfix }}" rel="stylesheet"> -->
        <link href="{{ mix('css/vendor.css') }}" rel="stylesheet">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        @yield('head')
    </head>
    <body>
      <header class="main-header">
          <div class="container">
              <div class="row">
                  <div class="col-12 header-text">
                      <p>ИАТЭ НИЯУ МИФИ (курс Веб-технологии)</p>
                  </div>
              </div>
          </div>
      </header>

      <div class="main-content container">
          @yield('content')
      </div>

      <footer class="main-footer">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      ©2021 НАЦИОНАЛЬНЫЙ ИССЛЕДОВАТЕЛЬСКИЙ ЯДЕРНЫЙ УНИВЕРСИТЕТ «МИФИ» (НИЯУ МИФИ)
                      ОБНИНСКИЙ ИНСТИТУТ АТОМНОЙ ЭНЕРГЕТИКИ (ИАТЭ)
                  </div>
              </div>
          </div>
      </footer>
      <script src="{{ mix('/js/manifest.js') }}"></script>
      <script src="{{ mix('/js/vendor.js') }}"></script>
      <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
