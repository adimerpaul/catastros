<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="img/gamo.png " width="100" class="img-fluid" alt="Responsive image">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                        <router-link
                            to="/home"
                            v-slot="{ href, route, navigate, isActive, isExactActive }"
                        >
                            <li class="nav-item">
                                <a class="nav-link" :href="href" @click="navigate" :class="[isActive && 'active', isExactActive && '']">
                                    <i class="fas fa-home"></i> Home

                                </a>
                            </li>
                        </router-link>

                        <router-link
                            to="/personas"
                            v-slot="{ href, route, navigate, isActive, isExactActive }">
                            <li class="nav-item">
                                <a class="nav-link" :href="href" @click="navigate" :class="[isActive && 'active', isExactActive && '']">
                                    <i class="fa fa-list"></i> Personas

                                </a>
                            </li>
                        </router-link>


                       @if (Auth::user()->tipo=='Admin')
                            <router-link
                                to="/users"
                                v-slot="{ href, route, navigate, isActive, isExactActive }">
                                <li class="nav-item">
                                    <a class="nav-link" :href="href" @click="navigate" :class="[isActive && 'active', isExactActive && '']">
                                        <i class="fa fa-user-plus"></i> Usuarios
                                    </a>
                                </li>
                            </router-link>
                            <router-link
                                to="/requisitos"
                                v-slot="{ href, route, navigate, isActive, isExactActive }">
                                <li class="nav-item">
                                    <a class="nav-link" :href="href" @click="navigate" :class="[isActive && 'active', isExactActive && '']">
                                        <i class="fa fa-clipboard"></i> Requisitos

                                    </a>
                                </li>
                            </router-link>
                            <router-link
                                to="/units"
                                v-slot="{ href, route, navigate, isActive, isExactActive }">
                                <li class="nav-item">
                                    <a class="nav-link" :href="href" @click="navigate" :class="[isActive && 'active', isExactActive && '']">
                                        <i class="fa fa-sitemap"></i> Unidades
                                    </a>
                                </li>
                            </router-link>
                        @endif


                        <router-link
                            to="/documentos"
                            v-slot="{ href, route, navigate, isActive, isExactActive }">
                            <li class="nav-item">
                                <a class="nav-link" :href="href" @click="navigate" :class="[isActive && 'active', isExactActive && '']">
                                    <i class="fas fa-clipboard-check"></i> Documentos

                                </a>
                            </li>
                        </router-link>

                        <router-link
                            to="/archivos"
                            v-slot="{ href, route, navigate, isActive, isExactActive }">
                            <li class="nav-item">
                                <a class="nav-link" :href="href" @click="navigate" :class="[isActive && 'active', isExactActive && '']">
                                    <i class="fas fa-folder-open"></i> Unidad
                                </a>
                            </li>
                        </router-link>
                            <router-link
                                to="/historial"
                                v-slot="{ href, route, navigate, isActive, isExactActive }">
                                <li class="nav-item">
                                    <a class="nav-link" :href="href" @click="navigate" :class="[isActive && 'active', isExactActive && '']">
                                        <i class="fas fa-history"></i> Historial
                                    </a>
                                </li>
                            </router-link>

                        @endauth
                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
