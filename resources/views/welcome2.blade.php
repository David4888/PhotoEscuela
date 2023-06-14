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

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
 
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

<body class="bg-black h-screen antialiased leading-none font-sans">
    <div class="px-6">
        @if(Route::has('login'))
        <div class="mt-4 mr-4 space-x-4 sm:mt-6 sm:mr-6 sm:space-x-6 flex flex-row justify-between">
            <div class="flex flex-row">
                <div class="material-symbols-outlined text-lg font-semibold text-gray-500">
                    photo_camera
                </div>
                <a href="{{ route('fotos') }}"
                    class="px-6 no-underline hover:underline text-sm font-bold text-white uppercase">{{ __('Fotos')
                    }}</a>
                <a href="{{ url('/fotos/carrusel') }}"
                    class="px-6 no-underline hover:underline text-sm font-bold text-white uppercase">{{ __('Galería')
                    }}</a>
                <a href="{{ url('/contacto') }}"
                    class="px-6 no-underline hover:underline text-sm font-bold text-white uppercase">{{ __('Contacto')
                    }}</a>
            </div>

            <div>
                @auth
                <a href="{{ url('/home') }}"
                    class="no-underline hover:underline text-sm font-bold text-white uppercase">{{ __('Home') }}</a>
                @else
                <a href="{{ route('login') }}"
                    class="p-3 no-underline hover:underline text-sm font-bold text-white uppercase">{{ __('Login')
                    }}</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="no-underline hover:underline text-sm font-bold text-white uppercase">{{ __('Registro') }}</a>
                @endif
                @endauth
            </div>
        </div>
        @endif
    </div>

    <style>
        * {
            margin: 0;
            padding: 0;
            bottom: 0;
        }

        /*elimina un pequeño margen que sale por defecto en la página web*/

        body {
            font-family: sans-serif;
        }

        .foto {
            padding: 20px;
            text-align: center;
            background: aliceblue;
            height: 300px;


            /*centrar el contenido*/
            display: flex;
            align-items: center;
            justify-content: center;
            background: url('https://images.unsplash.com/photo-1504892612018-159ffa1d147f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80') center center no-repeat fixed;
            background-size: cover;


        }

        .foto h2 {
            color: aliceblue;
            font-size: 3vw;
            /*Hace que los h2 se hacen más pequeños en función del tamaño del dispositivo*/

        }

        /*Este es el primer elemento de la clase foto*/
        .foto {
            height: 100vh;
            /*Para que ocupe el 75% del dispositivo*/
        }

        /* Accedemos a los hijos */
        .foto:nth-child(1) {
            background-image: url('https://images.unsplash.com/photo-1490596541415-5afadbfbbf02?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=939&q=80');
        }

        .foto:nth-child(2) {
            background-image: url('https://images.unsplash.com/photo-1504892612018-159ffa1d147f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80');
        }

        .foto:nth-child(3) {
            background-image: url('https://c.wallhere.com/photos/95/89/aurora_borealis_atmosphere-263884.jpg!d');
        }

        .foto h2 {
            opacity: 0;
            scale: 3;
            filter: blur(5px);
            transition: 0.9s;
            text-shadow: 0 0 6px rgba(0, 0, 0, .8)
        }

        .foto:hover h2 {
            opacity: 1;
            scale: 1;
            filter: blur(0)
        }
    </style>
    <div class="min-h-screen flex items-center justify-center">
        <div class="flex flex-col justify-around h-full">
            <div>
                <img src="{{ asset('images/CamaraPortada1.1.jpg')}}">
            </div>
        </div>
    </div>
    <div>
        <div class="foto">
            <h2>La página de fotos donde subir tus mejores fotos</h2>
        </div>
        <div class="foto">
            <h2>Regístrate y comparte tus mejores capturas con cientos de usuarios</h2>
        </div>
        <div class="foto">
            <h2>Estos son sólo algunos ejemplos</h2>
        </div>
    </div>





</body>

</html>