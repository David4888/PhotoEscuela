@extends('admin.index')

@section("content")

    <h1 class="text-center text-success">{{ __("Listado de usuarios") }}</h1>
       
    
<table class="table table-success table-striped" style="width: 100%">
    <thead>
    <tr>
        <th scope="col">{{ ("Nombre") }}</th>
        <th scope="col">{{ ("Email") }}</th>
        <th scope="col">{{ ("Rol") }}</th>
        <th scope="col">{{ ("Fecha Alta") }}</th>
        <th scope="col">{{ ("Opciones") }}</th>
    </tr>
    </thead>
    <tbody>
        @forelse($users as $user)
       
            <tr>

                <td>{{ $user->name }}</td>

                <td>{{ $user->email }}</td>

                <td>
                    @foreach ($user->roles as $role)
                        {{ $role->name.' ' }}
                    @endforeach
                </td>
                <td>{{ date_format($user->created_at, "d/m/Y") }}</td>

                <td>
            <form action="{{route('users.destroy', $user->id)}}" method="POST" class="hidden">
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
                        <p><strong class="font-bold">{{ __("No hay usuarios") }}</strong></p>
                        <span class="block sm:inline">{{ __("No existen usuarios que mostrar") }}</span>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">

</div>
@endsection