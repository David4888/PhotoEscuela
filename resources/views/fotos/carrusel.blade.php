@extends('/layouts.app')

@section('content')

<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

    <style>
        .carrusel {
            position: relative;
            width: 100%;
            height: 400px;
        }
        .carrusel figure{
            position: absolute;
            display: flex;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: white;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Slider
            </header>

            <div class="carrusel">
                @foreach ($fotos as $foto)
                <figure>
                    <img class="" src="/images/fotos/{{$foto->id}}.jpg?{{Carbon\Carbon::now()->timestamp}}"
                        style="width: 500px; margin:auto; object-fit:cover">
    
                    <caption>{{ $foto->Descripcion }}</caption>
                </figure>
                @endforeach
            </div>

            <div class="md:flex md:items-center">
        <div class="md:w-1/3 px-3">
            <input type="button" class="shadow bg-gray-400 hover:bg-purple-300 hover:text-white focus:shadow-outline focus:outline-none text-gray-300 font-bold py-2 px-4 rounded-s" value="Anterior" onclick="anterior()" ;>
            <input type="button" class="shadow bg-gray-400 hover:bg-purple-300 hover:text-white focus:shadow-outline focus:outline-none text-gray-300 font-bold py-2 px-4 rounded-s" value="Siguiente" onclick="siguiente()" ;>

            <!-- <button id="siguiente" class="shadow bg-gray-400 hover:bg-purple-300 hover:text-white focus:shadow-outline focus:outline-none text-gray-300 font-bold py-2 px-4 rounded-s" type="submit">
                Siguiente
            </button> -->
        </div>
    </div>
    </div>
    </section>
</main>
@endsection