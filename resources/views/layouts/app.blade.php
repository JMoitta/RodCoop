<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar fixed-top sticky-top navbar-expand-lg navbar-dark bg-primary">
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavHeader" aria-controls="navbarNavHeader" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavHeader">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    @can('admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.index') }}">{{ __('Dashboard') }}</a></li>
                        @can('root')
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.administrative-regions.index') }}">{{ __('Administrative regions') }}</a></li>
                        @endcan
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.list-casters.index') }}">{{ __('List casters') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.praying-houses.index') }}">{{ __('Houses of prayer') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.cooperators.index') }}">{{ __('Cooperators') }}</a></li>
                    @endcan
                </ul>

                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    @if (Auth::guest())
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" role="menu">
                                <a  class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
        <div class="p-3">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
