@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto py-10 px-6">

    {{-- Encabezado --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">

        <div>

            <h1 class="text-3xl font-bold text-red-600">
                Detalle del Plan Alimenticio
            </h1>

            <p class="text-gray-400 mt-2">
                Información completa del plan alimenticio.
            </p>

        </div>

        <a
            href="{{ route('alimentacion.index') }}"
            class="bg-gray-600 hover:bg-gray-700
                   text-white px-5 py-3 rounded-lg
                   text-center transition duration-300">

            Volver

        </a>

    </div>


    {{-- Contenedor principal --}}
    <div class="bg-gray-900 border border-red-600 rounded-xl p-8">


        {{-- Información general --}}
        <h2 class="text-2xl font-bold text-red-500 mb-6">
            Información del Plan
        </h2>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


            {{-- Cliente --}}
            <div class="bg-gray-800 rounded-lg p-5">

                <p class="text-gray-400 mb-1">
                    Cliente
                </p>

                <p class="text-white text-lg font-semibold">

                    {{ $alimentacion->cliente->nombres }}
                    {{ $alimentacion->cliente->apellidos }}

                </p>

            </div>


            {{-- Nombre del plan --}}
            <div class="bg-gray-800 rounded-lg p-5">

                <p class="text-gray-400 mb-1">
                    Nombre del plan
                </p>

                <p class="text-white text-lg font-semibold">
                    {{ $alimentacion->nombre_plan }}
                </p>

            </div>


            {{-- Objetivo --}}
            <div class="bg-gray-800 rounded-lg p-5">

                <p class="text-gray-400 mb-1">
                    Objetivo
                </p>

                <p class="text-white text-lg">
                    {{ $alimentacion->objetivo }}
                </p>

            </div>


            {{-- Calorías --}}
            <div class="bg-gray-800 rounded-lg p-5">

                <p class="text-gray-400 mb-1">
                    Calorías diarias
                </p>

                <p class="text-white text-lg">

                    @if($alimentacion->calorias)

                        {{ $alimentacion->calorias }} kcal

                    @else

                        No especificadas

                    @endif

                </p>

            </div>


            {{-- Estado --}}
            <div class="bg-gray-800 rounded-lg p-5">

                <p class="text-gray-400 mb-1">
                    Estado
                </p>

                @if($alimentacion->estado)

                    <span class="text-green-500 font-semibold">
                        ● Activo
                    </span>

                @else

                    <span class="text-red-500 font-semibold">
                        ● Inactivo
                    </span>

                @endif

            </div>

        </div>


        <hr class="my-10 border-gray-700">


        {{-- Alimentación diaria --}}
        <h2 class="text-2xl font-bold text-red-500 mb-6">
            Alimentación Diaria
        </h2>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


            {{-- Desayuno --}}
            <div class="bg-gray-800 border border-gray-700 rounded-lg p-6">

                <h3 class="text-xl text-red-400 font-semibold mb-4">
                    🌅 Desayuno
                </h3>

                <p class="text-gray-300 whitespace-pre-line">

                    {{ $alimentacion->desayuno ?: 'No registrado.' }}

                </p>

            </div>


            {{-- Almuerzo --}}
            <div class="bg-gray-800 border border-gray-700 rounded-lg p-6">

                <h3 class="text-xl text-red-400 font-semibold mb-4">
                    ☀️ Almuerzo
                </h3>

                <p class="text-gray-300 whitespace-pre-line">

                    {{ $alimentacion->almuerzo ?: 'No registrado.' }}

                </p>

            </div>


            {{-- Merienda --}}
            <div class="bg-gray-800 border border-gray-700 rounded-lg p-6">

                <h3 class="text-xl text-red-400 font-semibold mb-4">
                    🍎 Merienda
                </h3>

                <p class="text-gray-300 whitespace-pre-line">

                    {{ $alimentacion->merienda ?: 'No registrado.' }}

                </p>

            </div>


            {{-- Cena --}}
            <div class="bg-gray-800 border border-gray-700 rounded-lg p-6">

                <h3 class="text-xl text-red-400 font-semibold mb-4">
                    🌙 Cena
                </h3>

                <p class="text-gray-300 whitespace-pre-line">

                    {{ $alimentacion->cena ?: 'No registrado.' }}

                </p>

            </div>

        </div>


        {{-- Observaciones --}}
        <div class="mt-8">

            <h2 class="text-2xl font-bold text-red-500 mb-4">
                Observaciones
            </h2>

            <div class="bg-gray-800 border border-gray-700 rounded-lg p-6">

                <p class="text-gray-300 whitespace-pre-line">

                    {{ $alimentacion->observaciones ?: 'Sin observaciones.' }}

                </p>

            </div>

        </div>


        {{-- Acciones --}}
        <div class="mt-8 flex flex-wrap gap-3">

            {{-- Editar --}}
            <a
                href="{{ route('alimentacion.edit', $alimentacion) }}"
                class="bg-blue-600 hover:bg-blue-700
                       text-white px-6 py-3 rounded-lg
                       transition duration-300">

                Editar Plan

            </a>


            {{-- Eliminar --}}
            <form
                action="{{ route('alimentacion.destroy', $alimentacion) }}"
                method="POST"
                onsubmit="return confirm('¿Está seguro de eliminar este plan alimenticio?')">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="bg-red-600 hover:bg-red-700
                           text-white px-6 py-3 rounded-lg
                           transition duration-300">

                    Eliminar Plan

                </button>

            </form>


            {{-- Volver --}}
            <a
                href="{{ route('alimentacion.index') }}"
                class="bg-gray-600 hover:bg-gray-700
                       text-white px-6 py-3 rounded-lg
                       transition duration-300">

                Volver a Alimentación

            </a>

        </div>

    </div>

</div>

@endsection