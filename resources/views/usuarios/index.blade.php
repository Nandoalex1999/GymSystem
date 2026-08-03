@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10 px-6">

    <div class="flex justify-between items-center mb-8">

        <h1 class="text-3xl font-bold text-red-600">
            Gestión de Usuarios
        </h1>

        <a href="{{ route('usuarios.create') }}"
           class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg">

            Nuevo Usuario

        </a>

    </div>

    <div class="overflow-hidden rounded-xl border border-red-600">

        <table class="w-full text-left">

            <thead class="bg-gray-900 text-red-500">
                <tr>
                    <th class="p-4">ID</th>
                    <th class="p-4">Nombre</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Rol</th>
                    <th class="p-4">Acciones</th>
                </tr>
            </thead>

            <tbody>

            @forelse($usuarios as $usuario)

                <tr class="border-b border-gray-800">

                    <td class="p-4">{{ $usuario->id }}</td>
                    <td class="p-4">{{ $usuario->name }}</td>
                    <td class="p-4">{{ $usuario->email }}</td>
                    <td class="p-4">{{ $usuario->role->nombre ?? 'Sin rol' }}</td>

                   <td class="p-4">

    <a href="{{ route('usuarios.edit', $usuario) }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">
        Editar
    </a>

    <form action="{{ route('usuarios.destroy', $usuario) }}"
      method="POST"
      class="inline"
      onsubmit="return confirm('¿Está seguro de eliminar este usuario?')">

    @csrf
    @method('DELETE')

    <button
        type="submit"
        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded ml-2">

        Eliminar

    </button>

</form>

</td>

                </tr>

            @empty

                <tr>
                    <td colspan="5" class="text-center p-6">
                        No existen usuarios registrados.
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection