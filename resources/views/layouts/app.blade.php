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
    <script src="{{ asset('js/javascript.js') }}" defer></script>
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<style>
    .material-symbols-outlined {
      font-variation-settings:
      'FILL' 0,
      'wght' 400,
      'GRAD' 0,
      'opsz' 48
    }
    </style>
<body class="bg-black antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-black py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div class="flex flex-row">
                    <a href="{{ url('/') }}" class="mr-4 text-lg font-semibold text-gray-100 px-3 no-underline">
                        <span class="mr-4 material-symbols-outlined">
                            photo_camera
                            </span>
                    </a> 
                                       
                    @if(Route::current()->getName() != 'fotos')
                        <a href="{{ url('/fotos') }}" class="mr-4 text-lg font-semibold text-gray-100 px-3 no-underline hover:underline">
                           Mis Fotos
                        </a>
                    @else
                        <span class="mr-4 text-lg font-semibold text-gray-500">
                            Mis Fotos
                        </span>
                    @endif
                    @if(Route::current()->getName() != 'fotos.carrusel')
                        <a href="{{ url('/fotos/carrusel') }}" class="mr-4 text-lg font-semibold text-gray-100 px-3 no-underline hover:underline">
                            Galería
                        </a>
                    @else
                    <span class="mr-4 text-lg font-semibold text-gray-500">
                            Galería
                        </span>
                    @endif
                    @if(Route::current()->getName() != 'contacto.index')
                        <a href="{{ url('/contacto') }}" class="mr-4 text-lg font-semibold text-gray-100 px-3 no-underline hover:underline">
                           Contacto
                        </a>
                    @else
                    <span class="mr-4 text-lg font-semibold text-gray-500">
                            Contacto
                        </span>
                    @endif
                    
                </div>
                <nav class="space-x-4 text-white font-semibold text-sm sm:text-base">
                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Registro') }}</a>
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

