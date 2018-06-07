<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Smide by P.O Andersson</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <style media="screen">
    .top-right {
      position: absolute;
      right: 50px;
      top: 7px;
    }
    a{
      color: black;
    }
    a:hover {
        color: white;
        background-color: grey;
    }
    </style>
    </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="/">Smide by P.O Andersson</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('products.index') }}">Produkter<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('ordersinprog.index') }}">Nuvarande jobb<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('orders.create') }}">Lägg order<span class="sr-only">(current)</span></a>
          </li>
          @if (Route::has('login'))
          <div class="top-right">
            @auth
              <a href="{{ url('/home') }}">Administratörsida</a>
              <div class="logoutholder">
                <a href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logga ut</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
              </div>
            @else
              <a href="{{ route('login') }}">Logga in</a>
              <a href="{{ route('register') }}">Registrera dig</a>
            @endauth
          </div>
          @endif
          <!--<li class="nav-item active">
            <a class="nav-link" href="{{ route('products.create') }}">Skapa ny produkt<span class="sr-only">(current)</span></a>
          </li>-->
      </nav>
      <!--@if (Route::has('login'))
      <div class="top-right">
        @auth
          <a href="{{ url('/home') }}">Hantera produkter</a>
          <div class="logoutholder">
            <a href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logga ut</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
          </div>
        @else
          <a href="{{ route('login') }}">Logga in</a>
          <a href="{{ route('register') }}">Registrera dig</a>
        @endauth
      </div>
      @endif
    </div>-->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

      <main class="py-4">
          @yield('content')
      </main>
    </body>
</html>
