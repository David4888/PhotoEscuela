<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Welcome') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>


</header>
<body class="bg-black h-screen antialiased leading-none font-sans">
<div class ="flex flex-col items-start px-5"> 
<a href="{{ url('/fotos/') }}" class="no-underline hover:underline text-sm font-bold text-white uppercase">{{ __('Fotos') }}</a>
</div>
<div class="flex flex-col items-end px-5">
    @if(Route::has('login'))
        <div class="mt-4 mr-4 space-x-4 sm:mt-6 sm:mr-6 sm:space-x-6">
            @auth
                <a href="{{ url('/home') }}" class="no-underline hover:underline text-sm font-bold text-white uppercase">{{ __('Home') }}</a>
            @else
                <a href="{{ route('login') }}" class="no-underline hover:bg-purple-300 text-sm font-bold text-white uppercase">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="no-underline hover:bg-purple-300 text-sm font-bold text-white uppercase">{{ __('Register') }}</a>
                @endif
            @endauth
        </div>
    @endif
    </div>

    <div class="min-h-screen flex items-center justify-center">
        <div class="flex flex-col justify-around h-full">
            <div > 
                    <img src="{{ asset('images/CamaraPortadaL.jpg')}}"> 
            </div>
        </div>
    </div>
</body>
</html>