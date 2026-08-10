@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto py-10 px-6">

    <h1 class="text-3xl font-bold text-red-600 mb-8">
        Editar Plan Alimenticio
    </h1>

    <div class="bg-gray-900 border border-red-600 rounded-xl p-8">

        <form action="{{ route('alimentacion.update', $alimentacion) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-6">

                {{-- Cliente --}}
                <div>
                    <label class="block text-white mb-2">
                        Cliente
                    </label>

                    <select
                        name="cliente_id"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                        required>

                        @foreach($clientes as $cliente)

                            <option
                                value="{{ $cliente->id }}"
                                {{ old('cliente_id', $alimentacion->cliente_id) == $cliente->id ? 'selected' : '' }}>

                                {{ $cliente->nombres }} {{ $cliente->apellidos }}

                            </option>

                        @endforeach

                    </select>
                </div>

                {{-- Nombre del plan --}}
                <div>
                    <label class="block text-white mb-2">
                        Nombre del plan
                    </label>

                    <input
                        type="text"
                        name="nombre_plan"
                        value="{{ old('nombre_plan', $alimentacion->nombre_plan) }}"
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
                        value="{{ old('objetivo', $alimentacion->objetivo) }}"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                        required>
                </div>

                {{-- Calorías --}}
                <div>
                    <label class="block text-white mb-2">
                        Calorías diarias
                    </label>

                    <input
                        type="number"
                        name="calorias"
                        value="{{ old('calorias', $alimentacion->calorias) }}"
                        min="1"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3">
                </div>

            </div>

            <hr class="my-8 border-gray-700">

            <h2 class="text-2xl text-red-500 mb-6">
                Alimentación diaria
            </h2>

            <div class="grid grid-cols-2 gap-6">

                {{-- Desayuno --}}
                <div>
                    <label class="block text-white mb-2">
                        Desayuno
                    </label>

                    <textarea
                        name="desayuno"
                        rows="4"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3">{{ old('desayuno', $alimentacion->desayuno) }}</textarea>
                </div>

                {{-- Almuerzo --}}
                <div>
                    <label class="block text-white mb-2">
                        Almuerzo
                    </label>

                    <textarea
                        name="almuerzo"
                        rows="4"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3">{{ old('almuerzo', $alimentacion->almuerzo) }}</textarea>
                </div>

                {{-- Merienda --}}
                <div>
                    <label class="block text-white mb-2">
                        Merienda
                    </label>

                    <textarea
                        name="merienda"
                        rows="4"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3">{{ old('merienda', $alimentacion->merienda) }}</textarea>
                </div>

                {{-- Cena --}}
                <div>
                    <label class="block text-white mb-2">
                        Cena
                    </label>

                    <textarea
                        name="cena"
                        rows="4"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3">{{ old('cena', $alimentacion->cena) }}</textarea>
                </div>

            </div>

            {{-- Observaciones --}}
            <div class="mt-6">

                <label class="block text-white mb-2">
                    Observaciones
                </label>

                <textarea
                    name="observaciones"
                    rows="4"
                    class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3">{{ old('observaciones', $alimentacion->observaciones) }}</textarea>

            </div>

            {{-- Estado --}}
            <div class="mt-6">

                <label class="block text-white mb-2">
                    Estado
                </label>

                <select
                    name="estado"
                    class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                    required>

                    <option value="1"
                        {{ old('estado', $alimentacion->estado) == 1 ? 'selected' : '' }}>
                        Activo
                    </option>

                    <option value="0"
                        {{ old('estado', $alimentacion->estado) == 0 ? 'selected' : '' }}>
                        Inactivo
                    </option>

                </select>

            </div>

            {{-- Botones --}}
            <div class="mt-8 flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

                    Guardar Cambios

                </button>

                <a
                    href="{{ route('alimentacion.index') }}"
                    class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg">

                    Cancelar

                </a>

            </div>

        </form>

    </div>

</div>

@endsection