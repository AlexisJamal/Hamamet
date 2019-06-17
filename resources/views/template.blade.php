<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        {!! Html::style('lib/bootstrap/bootstrap.min.css') !!}
        {!! Html::style('css/formaweb.css') !!}
        <title>@yield('titrePage')</title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">

            <a class="navbar-brand" href="{{url('/')}}">Hamamet</a>
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
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
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
    <header>
        <h1>@yield('titreItem')</h1>
    </header>
    @yield('contenu')

    <footer class="footer">
        <p></p>
    </footer>
    {!! Html::script('lib/jquery/jquery-3.3.1.slim.min.js') !!}
    {!! Html::script('lib/js/bootstrap.bundle.js') !!}
    {!! Html::script('lib/js/bootstrap.js') !!}
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')!!}
    </body>
</html>