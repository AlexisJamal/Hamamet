<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container">

                <a class="navbar-brand" href="http://localhost/ISI2/HamametV2/public">Hamamet</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{url('tacos')}}" id="navbardrop">
                                Nos Tacos
                            </a>
                        </li>
                        <li class="">
                            <a class="nav-link" href="{{url('pizzas')}}" id="navbardrop">
                                Nos Pizzas
                            </a>

                        </li>
                        <li class="">
                            <a class="nav-link" href="{{url('burgers')}}" id="navbardrop">
                                Nos Burgers
                            </a>

                        </li>


                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
                                    Bienvenue,  {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Se déconnecter') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="">
                                <a class="nav-link" href="{{url('panier')}}" id="navbardrop">
                                    Mon panier
                                </a>

                            </li>

                            @if(Auth::user()->isAdmin)
                                <li class="">
                                    <a class="nav-link" href="{{url('listeCommandes')}}" id="navbardrop">
                                        Les Commandes
                                    </a>

                                </li>
                            @endif

                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{ route('login') }}" id="navbardrop">
                                    Se connecter
                                </a>
                            </li>
                        @endauth


                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        @yield('js')
    </div>
</body>
</html>
