@extends('/layouts.app')

@section('content')
<form class="w-full max-w-lg border-4" method="POST" action="{{ route('fotos.store') }}" enctype="multipart/form-data">
    @csrf
     <h1 class="font-semibold py-5 text-blue mb-10 bg-blue-900 text-gray-500 px-5">Nueva Imágen</h1>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="Nombre">
                {{ __("Nombre") }}
            </label>
            <input name="Nombre" value="{{ old('Nombre') ?? '' }}" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="Nombre" type="text">
            @error("Nombre")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap mt-3">
        <div class="w-full px-5">    
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="Genero">
                {{ __("Genero") }}
            </label>
            <input name="Genero" value="{{ old('Genero') ?? '' }}" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="Genero" type="text">
            
            @error("Genero")
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
            <input name="Descripcion" value="{{ old('Descripcion') ?? '' }}" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="Descripcion" type="text">
            
            @error("Descripcion")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="Imagen">
                {{ __("Imagen") }}
            </label>
            <input name="Imagen" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="Imagen" type="file" method="post">
            
            @error("Imagen")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror

    <div class="md:flex md:items-center">
        <div class="md:w-1/3">
            <button class="shadow bg-gray-300 hover:bg-purple-300 focus:shadow-outline focus:outline-none text-gray-500 font-bold py-2 px-4 rounded" type="submit">
                Crear
            </button>
</form>