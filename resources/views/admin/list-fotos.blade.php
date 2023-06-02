@extends('admin.index')

@section("content")

    <h1 class="text-center text-success">{{ __("Listado de fotos") }}</h1>
       
    
<table class="table table-success table-striped" style="width: 100%">
    <thead>
    <tr>
        <th scope="col">{{ ("Nombre") }}</th>
        <th scope="col">{{ ("Categoria") }}</th>
        <th scope="col">{{ ("Descripcion") }}</th>
        <th scope="col">{{ ("Usuario") }}</th>
        <th scope="col">{{ ("Opciones") }}</th>
        
    </tr>
    </thead>
    <tbody>
        @forelse($fotos as $foto)
       
            <tr>

            <td>{{ $foto->Nombre }}</td>

            <td>{{ $foto->Genero }}</td>

            <td>{{ $foto->Descripcion }}</td>

            <td>{{ $foto->user->name }}</td>

            <td>
            <form action="{{route('fotos.destroy', $foto->id)}}" method="POST" class="hidden">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
            </form>
            </td>

            </tr>
        @empty
            <tr>
                <td colspan="4">
                    <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <p><strong class="font-bold">{{ __("No hay fotos") }}</strong></p>
                        <span class="block sm:inline">{{ __("No existen fotos que mostrar") }}</span>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">

</div>
@endsection