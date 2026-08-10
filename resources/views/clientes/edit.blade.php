@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10 px-6">

    <h1 class="text-3xl font-bold text-red-600 mb-8">
        Editar Cliente
    </h1>

    <div class="bg-gray-900 border border-red-600 rounded-xl p-8">

        <form action="{{ route('clientes.update', $cliente) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-6">

                {{-- Cédula --}}
                <div>
                    <label class="block text-white mb-2">
                        Cédula
                    </label>

                    <input
                        type="text"
                        name="cedula"
                        value="{{ old('cedula', $cliente->cedula) }}"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                        required>
                </div>

                {{-- Nombres --}}
                <div>
                    <label class="block text-white mb-2">
                        Nombres
                    </label>

                    <input
                        type="text"
                        name="nombres"
                        value="{{ old('nombres', $cliente->nombres) }}"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                        required>
                </div>

                {{-- Apellidos --}}
                <div>
                    <label class="block text-white mb-2">
                        Apellidos
                    </label>

                    <input
                        type="text"
                        name="apellidos"
                        value="{{ old('apellidos', $cliente->apellidos) }}"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                        required>
                </div>

                {{-- Fecha de nacimiento --}}
                <div>
                    <label class="block text-white mb-2">
                        Fecha de nacimiento
                    </label>

                    <input
                        type="date"
                        name="fecha_nacimiento"
                        value="{{ old('fecha_nacimiento', $cliente->fecha_nacimiento) }}"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                        required>
                </div>

                {{-- Sexo --}}
                <div>
                    <label class="block text-white mb-2">
                        Sexo
                    </label>

                    <select
                        name="sexo"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                        required>

                        <option value="Masculino"
                            {{ old('sexo', $cliente->sexo) == 'Masculino' ? 'selected' : '' }}>
                            Masculino
                        </option>

                        <option value="Femenino"
                            {{ old('sexo', $cliente->sexo) == 'Femenino' ? 'selected' : '' }}>
                            Femenino
                        </option>

                    </select>
                </div>

                {{-- Teléfono --}}
                <div>
                    <label class="block text-white mb-2">
                        Teléfono
                    </label>

                    <input
                        type="text"
                        name="telefono"
                        value="{{ old('telefono', $cliente->telefono) }}"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                        required>
                </div>

                {{-- Correo --}}
                <div>
                    <label class="block text-white mb-2">
                        Correo
                    </label>

                    <input
                        type="email"
                        name="correo"
                        value="{{ old('correo', $cliente->correo) }}"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                        required>
                </div>

                {{-- Dirección --}}
                <div>
                    <label class="block text-white mb-2">
                        Dirección
                    </label>

                    <input
                        type="text"
                        name="direccion"
                        value="{{ old('direccion', $cliente->direccion) }}"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                        required>
                </div>

                {{-- Altura --}}
                <div>
                    <label class="block text-white mb-2">
                        Altura (metros)
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="altura"
                        value="{{ old('altura', $cliente->altura) }}"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                        required>
                </div>

                {{-- Peso --}}
                <div>
                    <label class="block text-white mb-2">
                        Peso actual (kg)
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="peso_actual"
                        value="{{ old('peso_actual', $cliente->peso_actual) }}"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                        required>
                </div>

                {{-- Objetivo --}}
                <div>
                    <label class="block text-white mb-2">
                        Objetivo
                    </label>

                    <input
                        type="text"
                        name="objetivo"
                        value="{{ old('objetivo', $cliente->objetivo) }}"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                        required>
                </div>

                {{-- Estado --}}
                <div>
                    <label class="block text-white mb-2">
                        Estado
                    </label>

                    <select
                        name="estado"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                        required>

                        <option value="1"
                            {{ old('estado', $cliente->estado) == 1 ? 'selected' : '' }}>
                            Activo
                        </option>

                        <option value="0"
                            {{ old('estado', $cliente->estado) == 0 ? 'selected' : '' }}>
                            Inactivo
                        </option>

                    </select>
                </div>

            </div>

            <div class="mt-8 flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded">

                    Guardar Cambios

                </button>

                <a
                    href="{{ route('clientes.index') }}"
                    class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded">

                    Cancelar

                </a>

            </div>

        </form>

    </div>

</div>

@endsection