@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto py-10 px-6">

    <h1 class="text-3xl font-bold text-red-600 mb-8">
        Nuevo Plan Alimenticio
    </h1>

    <div class="bg-gray-900 border border-red-600 rounded-xl p-8">

        <form action="{{ route('alimentacion.store') }}" method="POST">

            @csrf

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

                        <option value="">
                            Seleccione un cliente
                        </option>

                        @foreach($clientes as $cliente)

                            <option
                                value="{{ $cliente->id }}"
                                {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>

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
                        value="{{ old('nombre_plan') }}"
                        placeholder="Ej: Plan de definición"
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
                        value="{{ old('objetivo') }}"
                        placeholder="Ej: Perder grasa"
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
                        value="{{ old('calorias') }}"
                        placeholder="Ej: 2200"
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
                        placeholder="Ej: Avena, fruta y yogurt"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3">{{ old('desayuno') }}</textarea>
                </div>

                {{-- Almuerzo --}}
                <div>
                    <label class="block text-white mb-2">
                        Almuerzo
                    </label>

                    <textarea
                        name="almuerzo"
                        rows="4"
                        placeholder="Ej: Pollo, arroz y ensalada"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3">{{ old('almuerzo') }}</textarea>
                </div>

                {{-- Merienda --}}
                <div>
                    <label class="block text-white mb-2">
                        Merienda
                    </label>

                    <textarea
                        name="merienda"
                        rows="4"
                        placeholder="Ej: Fruta y yogurt"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3">{{ old('merienda') }}</textarea>
                </div>

                {{-- Cena --}}
                <div>
                    <label class="block text-white mb-2">
                        Cena
                    </label>

                    <textarea
                        name="cena"
                        rows="4"
                        placeholder="Ej: Atún, verduras y aguacate"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3">{{ old('cena') }}</textarea>
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
                    placeholder="Observaciones o recomendaciones adicionales"
                    class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3">{{ old('observaciones') }}</textarea>

            </div>

            {{-- Botones --}}
            <div class="mt-8 flex gap-3">

                <button
                    type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">

                    Guardar Plan

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