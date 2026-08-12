@extends('layouts.app')

@section('content')

<div class="container mx-auto px-6 py-8">

    <h1 class="text-4xl font-bold text-red-500 mb-8">
        Nueva Rutina
    </h1>

    <div class="bg-gray-900 border border-red-500 rounded-lg p-8">

        <form action="{{ route('rutinas.store') }}" method="POST">

            @csrf

            {{-- Cliente --}}
            <div class="mb-5">
                <label for="cliente_id" class="block text-white font-semibold mb-2">
                    Cliente
                </label>

                <select
                    id="cliente_id"
                    name="cliente_id"
                    class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4"
                    style="height: 48px;"
                    required>

                    <option value="">Selecciona un cliente</option>

                    @foreach ($clientes as $cliente)
                        <option
                            value="{{ $cliente->id }}"
                            {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nombres }} {{ $cliente->apellidos }} - {{ $cliente->cedula }}
                        </option>
                    @endforeach

                </select>

                @error('cliente_id')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>


            {{-- Nombre --}}
            <div class="mb-5">
                <label for="nombre" class="block text-white font-semibold mb-2">
                    Nombre de la Rutina
                </label>

                <input
                    id="nombre"
                    type="text"
                    name="nombre"
                    value="{{ old('nombre') }}"
                    placeholder="Ejemplo: Rutina de hipertrofia"
                    class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4"
                    style="height: 48px;"
                    required>

                @error('nombre')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>


            {{-- Descripción --}}
            <div class="mb-8">
                <label for="descripcion" class="block text-white font-semibold mb-2">
                    Descripción
                </label>

                <textarea
                    id="descripcion"
                    name="descripcion"
                    placeholder="Describe brevemente el objetivo o contenido de la rutina..."
                    class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg p-4 resize-none"
                    style="height: 120px;">{{ old('descripcion') }}</textarea>

                @error('descripcion')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>


            <div class="flex gap-4">

                <button
                    type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-3 rounded-lg">
                    Guardar Rutina
                </button>

                <a
                    href="{{ route('rutinas.index') }}"
                    class="bg-gray-700 hover:bg-gray-600 text-white font-semibold px-6 py-3 rounded-lg">
                    Cancelar
                </a>

            </div>

        </form>

    </div>

</div>

@endsection