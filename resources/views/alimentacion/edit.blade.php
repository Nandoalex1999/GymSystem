@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto py-10 px-6">

    {{-- Encabezado --}}
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-red-600">
            Editar Plan Alimenticio
        </h1>

        <p class="text-gray-400 mt-2">
            Modifica la información del plan alimenticio seleccionado.
        </p>

    </div>


    {{-- Errores de validación --}}
    @if($errors->any())

        <div class="bg-red-900 border border-red-600
                    text-red-200 p-5 rounded-lg mb-6">

            <p class="font-bold mb-2">
                Revisa los siguientes errores:
            </p>

            <ul class="list-disc list-inside">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- Formulario --}}
    <div class="bg-gray-900 border border-red-600 rounded-xl p-8">

        <form
            action="{{ route('alimentacion.update', $alimentacion) }}"
            method="POST">

            @csrf
            @method('PUT')


            {{-- Información general --}}
            <h2 class="text-2xl font-bold text-red-500 mb-6">
                Información del Plan
            </h2>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                {{-- Cliente --}}
                <div>

                    <label class="block text-white mb-2">
                        Cliente
                    </label>

                    <select
                        name="cliente_id"
                        class="w-full rounded-lg bg-gray-800
                               border border-gray-700
                               text-white p-3
                               focus:border-red-500 focus:ring-red-500"
                        required>

                        <option value="">
                            Seleccione un cliente
                        </option>

                        @foreach($clientes as $cliente)

                            <option
                                value="{{ $cliente->id }}"
                                {{ old('cliente_id', $alimentacion->cliente_id) == $cliente->id ? 'selected' : '' }}>

                                {{ $cliente->nombres }}
                                {{ $cliente->apellidos }}

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
                        placeholder="Ej: Plan de definición"
                        class="w-full rounded-lg bg-gray-800
                               border border-gray-700
                               text-white p-3
                               focus:border-red-500 focus:ring-red-500"
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
                        placeholder="Ej: Perder grasa"
                        class="w-full rounded-lg bg-gray-800
                               border border-gray-700
                               text-white p-3
                               focus:border-red-500 focus:ring-red-500"
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
                        placeholder="Ej: 2200"
                        min="1"
                        max="10000"
                        class="w-full rounded-lg bg-gray-800
                               border border-gray-700
                               text-white p-3
                               focus:border-red-500 focus:ring-red-500">

                </div>

            </div>


            <hr class="my-10 border-gray-700">


            {{-- Alimentación diaria --}}
            <h2 class="text-2xl font-bold text-red-500 mb-6">
                Alimentación Diaria
            </h2>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                {{-- Desayuno --}}
                <div>

                    <label class="block text-white mb-2">
                        Desayuno
                    </label>

                    <textarea
                        name="desayuno"
                        rows="5"
                        placeholder="Ej: Avena, fruta y yogurt"
                        class="w-full rounded-lg bg-gray-800
                               border border-gray-700
                               text-white p-3
                               focus:border-red-500 focus:ring-red-500">{{ old('desayuno', $alimentacion->desayuno) }}</textarea>

                </div>


                {{-- Almuerzo --}}
                <div>

                    <label class="block text-white mb-2">
                        Almuerzo
                    </label>

                    <textarea
                        name="almuerzo"
                        rows="5"
                        placeholder="Ej: Pollo, arroz y ensalada"
                        class="w-full rounded-lg bg-gray-800
                               border border-gray-700
                               text-white p-3
                               focus:border-red-500 focus:ring-red-500">{{ old('almuerzo', $alimentacion->almuerzo) }}</textarea>

                </div>


                {{-- Merienda --}}
                <div>

                    <label class="block text-white mb-2">
                        Merienda
                    </label>

                    <textarea
                        name="merienda"
                        rows="5"
                        placeholder="Ej: Fruta y yogurt"
                        class="w-full rounded-lg bg-gray-800
                               border border-gray-700
                               text-white p-3
                               focus:border-red-500 focus:ring-red-500">{{ old('merienda', $alimentacion->merienda) }}</textarea>

                </div>


                {{-- Cena --}}
                <div>

                    <label class="block text-white mb-2">
                        Cena
                    </label>

                    <textarea
                        name="cena"
                        rows="5"
                        placeholder="Ej: Atún, verduras y aguacate"
                        class="w-full rounded-lg bg-gray-800
                               border border-gray-700
                               text-white p-3
                               focus:border-red-500 focus:ring-red-500">{{ old('cena', $alimentacion->cena) }}</textarea>

                </div>

            </div>


            {{-- Observaciones --}}
            <div class="mt-6">

                <label class="block text-white mb-2">
                    Observaciones
                </label>

                <textarea
                    name="observaciones"
                    rows="5"
                    placeholder="Observaciones o recomendaciones adicionales"
                    class="w-full rounded-lg bg-gray-800
                           border border-gray-700
                           text-white p-3
                           focus:border-red-500 focus:ring-red-500">{{ old('observaciones', $alimentacion->observaciones) }}</textarea>

            </div>


            {{-- Estado --}}
            <div class="mt-6">

                <label class="block text-white mb-2">
                    Estado
                </label>

                <select
                    name="estado"
                    class="w-full rounded-lg bg-gray-800
                           border border-gray-700
                           text-white p-3
                           focus:border-red-500 focus:ring-red-500"
                    required>

                    <option
                        value="1"
                        {{ old('estado', $alimentacion->estado) == 1 ? 'selected' : '' }}>

                        Activo

                    </option>

                    <option
                        value="0"
                        {{ old('estado', $alimentacion->estado) == 0 ? 'selected' : '' }}>

                        Inactivo

                    </option>

                </select>

            </div>


            {{-- Botones --}}
            <div class="mt-8 flex flex-wrap gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700
                           text-white px-6 py-3 rounded-lg
                           transition duration-300">

                    Guardar Cambios

                </button>


                <a
                    href="{{ route('alimentacion.index') }}"
                    class="bg-gray-600 hover:bg-gray-700
                           text-white px-6 py-3 rounded-lg
                           transition duration-300">

                    Cancelar

                </a>

            </div>

        </form>

    </div>

</div>

@endsection