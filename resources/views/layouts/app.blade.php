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
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark mx-3">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{ url('/') }}">Главная</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu-content" aria-controls="main-menu-content" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div id="main-menu-content" class="collapse navbar-collapse">
                  <ui class="navbar-nav mr-auto">
                      <li class="nav-item"><a class="nav-link" href="{{ url('/page') }}">javascript</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ url('/info') }}">Инфо</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ url('products') }}">Товары</a></li>
                      @admin
                          <li class="nav-item"><a class="nav-link" href="{{ url('user') }}">Пользователи</a></li>
                      @endadmin
                      @guest
                          <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Вход</a></li>
                      @else
                          <li class="nav-item">
                              <a class="nav-link" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                  Выйти
                              </a>
                              <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                      @endguest
                  </ui>
              </div>
            </div>
          </nav>
      </header>

      <div class="main-content container">

          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          @if (\Session::has('success'))
              <div class="alert alert-success">
                  <p>{{ \Session::get('success') }}</p>
              </div><br>
          @endif

          @yield('content')
      </div>

      <footer class="main-footer">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      ©{{ date('Y') }} НАЦИОНАЛЬНЫЙ ИССЛЕДОВАТЕЛЬСКИЙ ЯДЕРНЫЙ УНИВЕРСИТЕТ «МИФИ» (НИЯУ МИФИ)
                      ОБНИНСКИЙ ИНСТИТУТ АТОМНОЙ ЭНЕРГЕТИКИ (ИАТЭ)
                  </div>
              </div>
          </div>
      </footer>
      <script src="{{ mix('/js/manifest.js') }}"></script>
      <script src="{{ mix('/js/vendor.js') }}"></script>
      <script src="{{ mix('/js/ckeditor/ckeditor.js') }}"></script>
      <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
