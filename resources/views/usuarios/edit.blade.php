@extends('layouts.app')

@section('content')

<div class="container mx-auto px-6 py-8">

    <h1 class="text-4xl font-bold text-red-500 mb-8">
        Editar Usuario
    </h1>

    <div class="bg-gray-900 border border-red-500 rounded-lg p-8">

        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-5">
                <label class="block text-white mb-2">
                    Nombre
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ $usuario->name }}"
                    class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                    required>
            </div>

            <div class="mb-5">
                <label class="block text-white mb-2">
                    Correo Electrónico
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ $usuario->email }}"
                    class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                    required>
            </div>

            <div class="mb-5">
                <label class="block text-white mb-2">
                    Rol
                </label>

                <select
                    name="role_id"
                    class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3">

                    @foreach($roles as $rol)

                        <option value="{{ $rol->id }}"
                            {{ $usuario->role_id == $rol->id ? 'selected' : '' }}>
                            {{ $rol->nombre }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="flex gap-4">

                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded">

                    Actualizar

                </button>

                <a
                    href="{{ route('usuarios.index') }}"
                    class="bg-gray-700 hover:bg-gray-800 text-white px-6 py-3 rounded">

                    Cancelar

                </a>

            </div>

        </form>

    </div>

</div>

@endsection