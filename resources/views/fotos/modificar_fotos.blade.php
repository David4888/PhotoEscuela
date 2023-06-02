@extends('/layouts.app')

@section('content')
<form class="w-full max-w-full border-5" method="POST" action="{{ route('fotos.edit', ['id' => $foto]) }}"
    enctype="multipart/form-data">
    @csrf
    <h1 class="font-semibold text-center py-5 mb-10 bg-purple-200 text-white px-5">Modificar Foto</h1>
    <div class="flex flex-wrap mt-3">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="name">
                {{ __("Nombre") }}
            </label>
            <input name="Nombre" value="{{ old('Nombre') ?? $foto->Nombre }}"
                class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="título" type="text">

            @error("Nombre")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap mt-3">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="Categoria">
                {{ __("Categoria") }}
            </label>
            <select name="id_categoria"
                class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" @if ($categoria->id == old('id_categoria',
                    $foto->id_categoria))
                    selected="selected"
                    @endif
                    >{{ $categoria->Nombre }}</option>
                @endforeach
            </select>
            @error("id_categoria")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap mt-3">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="Descripcion">
                {{ __("Descripcion") }}
            </label>
            <input name="Descripcion" value="{{ old('Descripcion') ?? $foto->Descripcion }}"
                class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="sinopsis" type="text">

            @error("Descripcion")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>

            @enderror
        </div>
    </div> 
    <div class="flex flex-wrap mt-3 mb-6">
    <div class="w-full px-5">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="Imagen">
            {{ __("Imagen") }}
        </label>
        <input name="Imagen"
            class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="Imagen" type="file" method="post">

        @error("Imagen")
        <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
            {{ $message }}
        </div>
        @enderror
    </div>
    </div> 
    

    <div class="md:flex md:items-center">
        <div class="md:w-1/3 px-6">
            <button
                class="shadow bg-gray-400 hover:bg-purple-300 hover:text-white focus:shadow-outline focus:outline-none text-gray-300 font-bold py-2 px-4 rounded-lg"
                type="submit">
                Modificar
            </button>
        </div>
    </div>
</form>
@endsection