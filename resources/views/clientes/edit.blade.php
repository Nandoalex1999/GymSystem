@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto py-10 px-6">

    {{-- Encabezado --}}
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-red-600">
            Editar Cliente
        </h1>

        <p class="text-gray-400 mt-2">
            Actualiza la información del cliente seleccionado.
        </p>

    </div>


    {{-- Errores de validación --}}
    @if ($errors->any())

        <div class="mb-6 bg-red-900 border border-red-600 text-red-200 rounded-lg p-5">

            <p class="font-bold mb-2">
                Se encontraron los siguientes errores:
            </p>

            <ul class="list-disc list-inside">

                @foreach ($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- Formulario --}}
    <div class="bg-gray-900 border border-red-600 rounded-xl p-6">

        <form action="{{ route('clientes.update', $cliente) }}" method="POST">

            @csrf
            @method('PUT')


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                {{-- Usuario asociado --}}
                <div>

                    <label for="user_id"
                           class="block mb-2 font-semibold text-gray-200">

                        Usuario asociado

                    </label>

                    <select
                        id="user_id"
                        name="user_id"
                        required
                        class="w-full rounded-lg border border-gray-600
                               bg-gray-800 text-white p-3
                               focus:border-red-600 focus:ring-red-600">

                        <option value="">
                            Seleccione un usuario
                        </option>

                        @foreach ($usuarios as $usuario)

                            <option value="{{ $usuario->id }}"
                                {{ old('user_id', $cliente->user_id) == $usuario->id ? 'selected' : '' }}>

                                {{ $usuario->name }} - {{ $usuario->email }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Cédula --}}
                <div>

                    <label for="cedula"
                           class="block mb-2 font-semibold text-gray-200">

                        Cédula

                    </label>

                    <input
                        type="text"
                        id="cedula"
                        name="cedula"
                        maxlength="20"
                        value="{{ old('cedula', $cliente->cedula) }}"
                        required
                        class="w-full rounded-lg border border-gray-600
                               bg-gray-800 text-white p-3
                               focus:border-red-600 focus:ring-red-600">

                </div>


                {{-- Nombres --}}
                <div>

                    <label for="nombres"
                           class="block mb-2 font-semibold text-gray-200">

                        Nombres

                    </label>

                    <input
                        type="text"
                        id="nombres"
                        name="nombres"
                        value="{{ old('nombres', $cliente->nombres) }}"
                        required
                        class="w-full rounded-lg border border-gray-600
                               bg-gray-800 text-white p-3
                               focus:border-red-600 focus:ring-red-600">

                </div>


                {{-- Apellidos --}}
                <div>

                    <label for="apellidos"
                           class="block mb-2 font-semibold text-gray-200">

                        Apellidos

                    </label>

                    <input
                        type="text"
                        id="apellidos"
                        name="apellidos"
                        value="{{ old('apellidos', $cliente->apellidos) }}"
                        required
                        class="w-full rounded-lg border border-gray-600
                               bg-gray-800 text-white p-3
                               focus:border-red-600 focus:ring-red-600">

                </div>


                {{-- Fecha de nacimiento --}}
                <div>

                    <label for="fecha_nacimiento"
                           class="block mb-2 font-semibold text-gray-200">

                        Fecha de nacimiento

                    </label>

                    <input
                        type="date"
                        id="fecha_nacimiento"
                        name="fecha_nacimiento"
                        value="{{ old('fecha_nacimiento', $cliente->fecha_nacimiento ? $cliente->fecha_nacimiento->format('Y-m-d') : '') }}"
                        max="{{ date('Y-m-d') }}"
                        required
                        class="w-full rounded-lg border border-gray-600
                               bg-gray-800 text-white p-3
                               focus:border-red-600 focus:ring-red-600">

                </div>


                {{-- Sexo --}}
                <div>

                    <label for="sexo"
                           class="block mb-2 font-semibold text-gray-200">

                        Sexo

                    </label>

                    <select
                        id="sexo"
                        name="sexo"
                        required
                        class="w-full rounded-lg border border-gray-600
                               bg-gray-800 text-white p-3
                               focus:border-red-600 focus:ring-red-600">

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

                    <label for="telefono"
                           class="block mb-2 font-semibold text-gray-200">

                        Teléfono

                    </label>

                    <input
                        type="text"
                        id="telefono"
                        name="telefono"
                        maxlength="20"
                        value="{{ old('telefono', $cliente->telefono) }}"
                        required
                        class="w-full rounded-lg border border-gray-600
                               bg-gray-800 text-white p-3
                               focus:border-red-600 focus:ring-red-600">

                </div>


                {{-- Correo --}}
                <div>

                    <label for="correo"
                           class="block mb-2 font-semibold text-gray-200">

                        Correo electrónico

                    </label>

                    <input
                        type="email"
                        id="correo"
                        name="correo"
                        value="{{ old('correo', $cliente->correo) }}"
                        required
                        class="w-full rounded-lg border border-gray-600
                               bg-gray-800 text-white p-3
                               focus:border-red-600 focus:ring-red-600">

                </div>


                {{-- Dirección --}}
                <div>

                    <label for="direccion"
                           class="block mb-2 font-semibold text-gray-200">

                        Dirección

                    </label>

                    <input
                        type="text"
                        id="direccion"
                        name="direccion"
                        value="{{ old('direccion', $cliente->direccion) }}"
                        required
                        class="w-full rounded-lg border border-gray-600
                               bg-gray-800 text-white p-3
                               focus:border-red-600 focus:ring-red-600">

                </div>


                {{-- Altura --}}
                <div>

                    <label for="altura"
                           class="block mb-2 font-semibold text-gray-200">

                        Altura (metros)

                    </label>

                    <input
                        type="number"
                        id="altura"
                        name="altura"
                        step="0.01"
                        min="0.5"
                        max="2.5"
                        value="{{ old('altura', $cliente->altura) }}"
                        required
                        placeholder="Ej. 1.70"
                        class="w-full rounded-lg border border-gray-600
                               bg-gray-800 text-white p-3
                               focus:border-red-600 focus:ring-red-600">

                </div>


                {{-- Peso --}}
                <div>

                    <label for="peso_actual"
                           class="block mb-2 font-semibold text-gray-200">

                        Peso actual (kg)

                    </label>

                    <input
                        type="number"
                        id="peso_actual"
                        name="peso_actual"
                        step="0.01"
                        min="1"
                        max="500"
                        value="{{ old('peso_actual', $cliente->peso_actual) }}"
                        required
                        placeholder="Ej. 80.50"
                        class="w-full rounded-lg border border-gray-600
                               bg-gray-800 text-white p-3
                               focus:border-red-600 focus:ring-red-600">

                </div>


                {{-- Objetivo --}}
                <div>

                    <label for="objetivo"
                           class="block mb-2 font-semibold text-gray-200">

                        Objetivo

                    </label>

                    <input
                        type="text"
                        id="objetivo"
                        name="objetivo"
                        value="{{ old('objetivo', $cliente->objetivo) }}"
                        required
                        placeholder="Ej. Perder grasa, ganar masa muscular..."
                        class="w-full rounded-lg border border-gray-600
                               bg-gray-800 text-white p-3
                               focus:border-red-600 focus:ring-red-600">

                </div>


                {{-- Estado --}}
                <div>

                    <label for="estado"
                           class="block mb-2 font-semibold text-gray-200">

                        Estado

                    </label>

                    <select
                        id="estado"
                        name="estado"
                        required
                        class="w-full rounded-lg border border-gray-600
                               bg-gray-800 text-white p-3
                               focus:border-red-600 focus:ring-red-600">

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


            {{-- Botones --}}
            <div class="flex flex-col sm:flex-row gap-4 mt-8">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700
                           text-white font-semibold
                           px-6 py-3 rounded-lg
                           transition duration-300">

                    Guardar Cambios

                </button>


                <a
                    href="{{ route('clientes.index') }}"
                    class="bg-gray-700 hover:bg-gray-600
                           text-white font-semibold
                           px-6 py-3 rounded-lg
                           text-center
                           transition duration-300">

                    Cancelar

                </a>

            </div>

        </form>

    </div>

</div>

@endsection