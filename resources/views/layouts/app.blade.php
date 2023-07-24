<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Boutique de Matériel Téléphonique</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
    crossorigin="anonymous">
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/all.min.css"
    integrity="sha384-s66/IoFsyW0OIdS+SwPnGz5mLvjeAPjtJaNf5ZzJFOkbksS8K1i9ehu5/FLHg3jg"
    crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .navbar-brand i {
            font-size: 24px;
            margin-right: 8px;
        }
        .navbar-brand span {
            font-size: 18px;
            font-weight: bold;
        }
        .navbar-toggler-icon {
            color: #000;
        }
        .nav-link i {
            margin-right: 8px;
        }

        /* Custom Colors */
        .navbar {
            background-color: #007BFF; /* Blue color */
        }

        .navbar-brand,
        .navbar-brand span {
            color: #FFF; /* White color */
        }

        .navbar-toggler {
            border-color: #FFF; /* White color */
        }

        .nav-link {
            color: #FFF; /* White color */
        }

        .nav-link:hover {
            color: #F4F4F4; /* Lighter white color on hover */
        }

        .dropdown-menu {
            background-color: #007BFF; /* Blue color */
        }

        .dropdown-item {
            color: #FFF; /* White color */
        }

        .dropdown-item:hover {
            background-color: #0056b3; /* Darker blue color on hover */
        }

        .navbar .btn {
            color: #FFF; /* White color */
            border-color: #FFF; /* White color */
        }

        .navbar .btn:hover {
            background-color: #0056b3; /* Darker blue color on hover */
        }

        .alert {
            border-color: #007BFF; /* Blue color */
        }

        .alert-info {
            background-color: #E7F0FF; /* Light blue color */
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fas fa-mobile-alt"></i>
                    <span>Boutique de Matériel Téléphonique</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <i class="fas fa-sign-in-alt"></i>
                                        {{ __('Login for users') }}
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <i class="fas fa-user-plus"></i>
                                        {{ __('Register for users') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('admin.logout') }}" >
                                    <i class="fas fa-user"></i>
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-6 mx-auto my-4">
                @include('layouts.alerts')
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
     integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
     crossorigin="anonymous"></script>
</body>
</html>
