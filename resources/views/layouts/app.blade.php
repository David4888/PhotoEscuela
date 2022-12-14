<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
   

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-purple-100 antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-gray-400 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 px-3 no-underline hover:underline">
                        Principal
                    </a>                    
                    @if(Route::current()->getName() != 'listaFotos')
                        <a href="{{ url('/fotos') }}" class="text-lg font-semibold text-gray-100 px-3 no-underline hover:underline">
                            Fotos
                        </a>
                    @else
                        Fotos
                    @endif
                    @if(Route::current()->getName() != 'fotos')
                        <a href="{{ url('/fotos') }}" class="text-lg font-semibold text-gray-100 px-3 no-underline hover:underline">
                            Cursos
                        </a>
                    @else
                        Cursos
                    @endif
                </div>
                <nav class="space-x-4 text-white font-semibold text-sm sm:text-base">
                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <span>{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>

        @yield('content')
    </div>
</body>
</html>

