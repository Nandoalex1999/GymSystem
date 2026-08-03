@extends('layouts.app')

@section('content')

<div class="container mx-auto px-6 py-8">

    <h1 class="text-4xl font-bold text-red-500 mb-8">
        Nuevo Usuario
    </h1>

    @if ($errors->any())
    <div class="bg-red-600 text-white p-4 rounded mb-6">
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="bg-gray-900 border border-red-500 rounded-lg p-8">

        <form action="{{ route('usuarios.store') }}" method="POST">

            @csrf

            <div class="mb-5">
                <label class="block text-white mb-2">
                    Nombre
                </label>

                <input
                    type="text"
                    name="name"
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
                    class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                    required>
            </div>

            <div class="mb-5">
                <label class="block text-white mb-2">
                    Contraseña
                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                    required>
            </div>

            <div class="mb-5">
                <label class="block text-white mb-2">
                    Confirmar Contraseña
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                    required>
            </div>

            <div class="mb-8">
                <label class="block text-white mb-2">
                    Rol
                </label>

                <select
                    name="role_id"
                    class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3">

                    @foreach($roles as $rol)

                        <option value="{{ $rol->id }}">
                            {{ $rol->nombre }}
                        </option>

                    @endforeach

                </select>
            </div>

            <div class="flex gap-4">

                <button
                    type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded">

                    Guardar Usuario

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