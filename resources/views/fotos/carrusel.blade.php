@extends('/layouts.app')

@section('content')

<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        <style>
            .carrusel {
                position: relative;
                width: 100%;
                height: 700px;

            }

            .carrusel figure {
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
                transition: 5s;
            }

            .carrusel figure:not(:first-child) {
                opacity: 0;
            }

            img {
                border-radius: 20px;
                height: 650px;

            }
        </style>

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">


            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Galería de imágenes
            </header>

            <div class="flex flex-wrap mt-3">
                <div class="w-full px-5 mb-3">
                    <form class="w-full max-w-full border-5" method="GET" action="{{ route('fotos.carrusel') }}"
                        enctype="multipart/form-data">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3"
                            for="Categoria">
                            {{ __("Filtrar por Categoría") }}
                        </label>
                        <select name="id_categoria">
                            <option value="-1" @if (-1==$id_categoria) selected="selected" @endif>Todas</option>
                            @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" @if ($categoria->id == $id_categoria)
                                selected="selected"
                                @endif
                                >{{ $categoria->Nombre }}</option>
                            @endforeach
                        </select>

                        <button
                            class="shadow bg-gray-300 hover:bg-purple-300 hover:text-white focus:shadow-outline focus:outline-none text-gray-500 font-bold ml-2 py-2 px-4 rounded-lg"
                            type="submit">
                            Buscar
                        </button>

                        <div class="carrusel" id="pasefotos">
                            @forelse ($fotos as $foto)
                            <figure>
                            <div style="text-align:center;font-style: italic">Autor: {{ $foto->user->name }}</div> 
                                <img class="bg-purple-100" src="/images/fotos/{{$foto->id}}.jpg?{{Carbon\Carbon::now()->timestamp}}"
                                    style="width: 1080px; margin:auto; object-fit:cover">

                                <div>
                                    <div style="font-style: italic">{{ $foto->Descripcion }}</div>
                                    
                                </div>
                            </figure>
                            @empty
                            <figure>
                                <img class="" src="{{ asset('images/noencontrada.jpg') }}"
                                    style="width: 1080px; margin:auto; object-fit:cover">

                                <caption>No hay imágenes en esta categoría<br>
                            </figure>
                            @endforelse
                        </div>
                    </form>

                    <div class="flex justify-center">
                        <div class="my-6">
                            <input type="button"
                                class="shadow bg-gray-300 hover:bg-purple-300 hover:text-white focus:shadow-outline focus:outline-none text-gray-500 font-bold py-2 px-4 rounded-lg"
                                value="Anterior" onclick="anterior()" ;>
                            <input type="button"
                                class="shadow bg-gray-300 hover:bg-purple-300 hover:text-white focus:shadow-outline focus:outline-none text-gray-500 font-bold py-2 px-4 rounded-lg"
                                value="Siguiente" onclick="siguiente()" ;>
                        </div>
                    </div>
                </div>
        </section>
</main>
@endsection