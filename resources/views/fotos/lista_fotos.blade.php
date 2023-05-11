@extends('/layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if ($message = Session::get('success'))
     <div class="alert alert-success alert-block">
         <button type="button" class="close" data-dismiss="alert">×</button>	
         <strong>{{ $message }}</strong>
     </div>
        @endif
    
        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Fotos
            </header>

            <div class="w-full p-6">
                <p class="text-gray-700">
                    <table class="table table-striped" style="width: 100%">
                        <tr class="font-semibold">
                            <td style='text-align:center'>Nombre</td>
                            <td style='text-align:center'>Genero</td>
                            <td style='text-align:center'>Descripcion</td>
                            <td style='text-align:center'>Usuario</td>
                            <td style='text-align:center'>Foto</td>
                            <td style='text-align:center'>Opciones</td>
                        </tr> 
                        @forelse ($fotos as $foto)
                            <tr class="divide-gray-200 divide-y text-teal-800">
                                <td class="py-4 px-4" style='text-align:center'>{{ $foto->Nombre }}</td>
                                <td class="py-4 px-4" style='text-align:center'>{{ $foto->Genero }}</td>
                                <td class="py-4 px-4" style='text-align:center'>{{ $foto->Descripcion }}</td>
                                <td class="py-4 px-4" style='text-align:center'>{{ $foto->user->name }}</td>
                                <td class="py-4 px-4" style='text-align:center'>   <!--ponemos la ruta de la foto y la mostramos a traves del id-->
                                    <img src="/images/fotos/{{$foto->id}}.jpg" style="width: 200px; margin:auto">  
                                </td>
                                <td><a class="text-gray-500 font-semibold hover:bg-purple-300 rounded-lg hover:text-white" style='text-align:center' href="{{ route('fotos.edit', ['foto' => $foto->id]) }}">Modificar</a></td>

                                
                        @empty
                            <tr>
                                <td colspan="2">No hay fotos</td>
                            </tr>
                        @endforelse
                    </table>
                </p>
            </div>
        </section>
    </div>
</main>
@endsection
