@extends('/layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if ($message = Session::get('success'))
        <div>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @if ($message = Session::get('warning'))	
         <div><strong>{{ $message }}</strong>
        </div>
        @endif

        <style>
            .imggrande {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #0009;
                justify-content: center;
                align-items: center;

            }

            .imggrande img {
                height: 75%;
                width: auto;
                object-fit: cover;
            }

            .close {
                position: absolute;
                top: 15px;
                right: 200px;
                color: #f1f1f1;
                font-size: 40px;
                font-weight: bold;
                transition: 0.3s;
            }

            .close:hover,
            .close:focus {
                color: #bbb;
                text-decoration: none;
                cursor: pointer;
            }
        </style>

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Fotos
            </header>

            <form class="w-full max-w-full border-5" method="GET" action="{{ route('fotos') }}"
                enctype="multipart/form-data">
                
                <div class="flex flex-wrap mt-3">
                    <div class="w-full px-5 mb-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="Categoria">
                            {{ __("Filtrar por Categoria") }}
                        </label>
                        <select name="id_categoria">
                            <option value="-1"  @if (-1 == $id_categoria)
                                selected="selected"
                                @endif
                                >Todas</option>
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
                    
            

                        @error("id_categoria")
                        <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

            </form>

            <div class="w-full p-6">
                <p class="text-gray-700">
                <table class="table table-striped" style="width: 100%">
                    <tr class="font-semibold">
                        <td style='text-align:center'>Nombre</td>
                        <td style='text-align:center'>Categoria</td>
                        <td style='text-align:center'>Descripcion</td>
                        <td style='text-align:center'>Usuario</td>
                        <td style='text-align:center'>Foto</td>
                        <td style='text-align:center'>Opciones</td>
                    </tr>
                    @forelse ($fotos as $foto)
                    <tr class="divide-gray-200 divide-y text-teal-800">
                        <td class="py-4 px-4" style='text-align:center'>{{ $foto->Nombre }}</td>
                        <td class="py-4 px-4" style='text-align:center'>{{ $foto->categoria->Nombre }}</td>
                        <td class="py-4 px-4" style='text-align:center'>{{ $foto->Descripcion }}</td>
                        <td class="py-4 px-4" style='text-align:center'>{{ $foto->user->name }}</td>
                        <td class="py-4 px-4" style='text-align:center'>
                            <!--ponemos la ruta de la foto y la mostramos a traves del id-->
                            <img class="ampliable"
                                src="/images/fotos/{{$foto->id}}.jpg?{{Carbon\Carbon::now()->timestamp}}"
                                style="width: 200px; margin:auto">
                            <div class="imggrande">
                                <span class="close">&times;</span>
                                <img src="/images/fotos/{{$foto->id}}.jpg?{{Carbon\Carbon::now()->timestamp}}">
                            </div>
                        </td>
                        <td><a class="text-gray-500 font-semibold hover:bg-purple-300 rounded hover:text-white"
                                style='text-align:center'
                                href="{{ route('fotos.edit', ['id' => $foto->id]) }}">Modificar</a>|
                            
                                <a class="text-gray-500 font-semibold hover:bg-red-700 rounded hover:text-white"
                                style='text-align:center'
                                href="{{ route('fotos.eliminar', ['id' => $foto->id]) }}">Eliminar</a></td>


                        @empty
                    <tr>
                        <td colspan="2" class="py-4">No hay fotos disponibles</td>
                    </tr>
                    @endforelse
                </table>
                </p>
            </div>
        </section>
    </div>
    <button class="my-6 px-6">
        <a class="shadow bg-gray-300 hover:bg-purple-300 hover:text-white focus:shadow-outline focus:outline-none text-gray-500 font-bold py-2 px-4 rounded-lg"
            style='text-align:center' href="{{ route('fotos.store') }}">Subir nueva foto</a>
    </button>
</main>
@endsection