<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Prueba Evertec')</title>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Merriweather" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
</head>
<body>
    <div id="app">
        <div class="container">
        <div class="row">
            <div class="col-12 text-center d-md-none redes-sociales-md-down">Siguenos en:<a href=""><i class="fab fa-facebook"></i></a><a href=""><i class="fab fa-instagram"></i></a><a href=""><i class="fab fa-twitter"></i></a><a href=""><i class="fab fa-pinterest"></i></a></div>
        </div>

        <div class="row">
            <div class="col-12 d-md-none"><img class="img-100" src="{{ asset('images/logo.png') }}"></div>
            <div class="col-4 d-none d-md-block"><img width="30%" src="{{ asset('images/logo.png') }}">
            </div>
            <div class="buscador-md-up col-4 d-none d-md-block">                
            </div>
            <div class="col-4 text-center d-none d-md-block redes-sociales-md">
                <p>Siguenos en:</p>
                <p><a href=""><i class="fab fa-facebook"></i></a><a href=""><i class="fab fa-instagram"></i></a><a href=""><i class="fab fa-twitter"></i></a><a href=""><i class="fab fa-pinterest"></i></a></p>
            </div>
        </div>
        </div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <ul class="nav navbar-nav">
                    <li class="nav-item d-md-none">
                            <form action="/busqueda">
                                <div class="input-group">
                                    <input type="text" name="query" required class="form-control" placeholder="Buscar Producto">
                                    <span class="input-grup-btn"><button class="btn btn-outline-light"><i class="fas fa-search"></i></button></span>
                                </div>
                            </form>
                        </li>
                </ul>
                <button style="background-color: white" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Regalo de cumpleaños</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Regalo de aniversario</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Regalos light</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Regalos Picnic</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Regalos Endulza el Dia</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Regalos Ancheta</a>
                            </div>
                        </li>                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <a class="nav-link" href="/dashboard">Mi Cuenta</a>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fas fa-user"></i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="content container">
            @yield('content')
        </main>
        <!-- /Footer -->
        <footer id="footer-container">
            <div class="container">
                <div class="row text-center">
                    <div class="col-12 col-md-4">
                        <img width="50%" src="{{ asset('images/logo.png') }}">
                        <p>En Gaby Regala Somos un equipo dedicado a trabajar con amor, para entregar momentos agradables y felices con detalles diseñados para cada ocasión.</p>
                    </div>
                    <div class="col-12 col-md-4">
                    </div>
                    <div class="col-md-4">
                        <br><br>
                        <p>Realiza los pagos de tus productos por medio de:</p>
                        <img src="https://static.placetopay.com/placetopay-logo.svg" class="attachment-0x0 size-0x0" alt="" loading="lazy">
                    </div>
                </div>
            </div>
            <br>
        </footer>
        <!-- /Footer -->
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
