@extends('layouts.app')

@section('content')

<div class="container mx-auto px-6 py-8">

    <h1 class="text-4xl font-bold text-red-500 mb-8">
        Editar Rutina
    </h1>

    <div class="bg-gray-900 border border-red-500 rounded-lg p-8">

        <form action="{{ route('rutinas.update', $rutina) }}" method="POST">

            @csrf
            @method('PUT')


            {{-- Cliente --}}
            <div class="mb-5">

                <label class="block text-white mb-2">
                    Cliente
                </label>

                <select
                    name="cliente_id"
                    class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                    required>

                    <option value="">
                        Selecciona un cliente
                    </option>

                    @foreach ($clientes as $cliente)

                        <option
                            value="{{ $cliente->id }}"
                            {{ old('cliente_id', $rutina->cliente_id) == $cliente->id ? 'selected' : '' }}>

                            {{ $cliente->nombres }}
                            {{ $cliente->apellidos }}
                            - {{ $cliente->cedula }}

                        </option>

                    @endforeach

                </select>

                @error('cliente_id')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Nombre --}}
            <div class="mb-5">

                <label class="block text-white mb-2">
                    Nombre de la Rutina
                </label>

                <input
                    type="text"
                    name="nombre"
                    value="{{ old('nombre', $rutina->nombre) }}"
                    placeholder="Ejemplo: Rutina de hipertrofia"
                    class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                    required>

                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Descripción --}}
            <div class="mb-8">

                <label class="block text-white mb-2">
                    Descripción
                </label>

                <textarea
                    name="descripcion"
                    rows="4"
                    placeholder="Describe brevemente el objetivo o contenido de la rutina..."
                    class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3">{{ old('descripcion', $rutina->descripcion) }}</textarea>

                @error('descripcion')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <div class="flex gap-4">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded">

                    Actualizar Rutina

                </button>


                <a
                    href="{{ route('rutinas.index') }}"
                    class="bg-gray-700 hover:bg-gray-800 text-white px-6 py-3 rounded">

                    Cancelar

                </a>

            </div>

        </form>

    </div>

</div>

@endsection