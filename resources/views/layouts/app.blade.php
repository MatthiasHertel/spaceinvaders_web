<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Spaceinvaders</title>

    <!-- Styles -->
    <!-- <link href="/css/app.css" rel="stylesheet"> -->
    <!-- Bootstrap -->

    {{ Html::style('css/cyborg/bootstrap.min.css') }}
    {{ Html::style('css/custom.css') }}

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]); !!}
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <!-- {{ config('app.name', 'Spaceinvaders') }} -->
                        <img src="/img/Space-large-invader.sh.png" alt="">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">Startseite</a></li>
                        <li class="{{ Request::is('highscore') ? "active" : "" }}"><a href="/highscore">Highscore</a></li>
                        <li class="{{ Request::is('dokumentation') ? "active" : "" }}"><a href="/dokumentation">Dokumentation</a></li>
                        <li class="{{ Request::is('download') ? "active" : "" }}"><a href="/download">Download</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->

                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Interner Bereich <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li class="{{ Request::is('intern/intern') ? "active" : "" }}">
                                  <a href="/intern/intern">Intern</a>
                                </li>
                                @if (Auth::user()->hasRole('Admin'))
                                <li class="{{ Request::is('intern/admin') ? "active" : "" }}">
                                  <a href="/intern/admin">Admin User-Roles</a>
                                </li>
                                <li class="{{ Request::is('intern/monitoring') ? "active" : "" }}">
                                  <a href="/intern/monitoring">Monitoring</a>
                                </li>
                                <li class="{{ Request::is('intern/chat') ? "active" : "" }}">
                                  <a href="/intern/chat">Chat</a>
                                </li>
                                @endif


                              </ul>
                            </li>

                            <!-- <li class="{{ Request::is('intern') ? "active" : "" }}"><a href="/intern">Interner Bereich</a></li> -->
                            <li class="dropdown">
                                <a href="#" id="username" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    @yield('scripts')
</body>
</html>
