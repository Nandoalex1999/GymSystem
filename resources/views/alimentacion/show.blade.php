@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto py-10 px-6">

    <div class="flex justify-between items-center mb-8">

        <h1 class="text-3xl font-bold text-red-600">
            Detalle del Plan Alimenticio
        </h1>

        <a href="{{ route('alimentacion.index') }}"
           class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2 rounded-lg">

            Volver

        </a>

    </div>

    <div class="bg-gray-900 border border-red-600 rounded-xl p-8">

        {{-- Información general --}}
        <h2 class="text-2xl text-red-500 mb-6">
            Información del Plan
        </h2>

        <div class="grid grid-cols-2 gap-6">

            <div>
                <p class="text-gray-400">
                    Cliente
                </p>

                <p class="text-white text-lg font-semibold">
                    {{ $alimentacion->cliente->nombres }}
                    {{ $alimentacion->cliente->apellidos }}
                </p>
            </div>

            <div>
                <p class="text-gray-400">
                    Nombre del plan
                </p>

                <p class="text-white text-lg font-semibold">
                    {{ $alimentacion->nombre_plan }}
                </p>
            </div>

            <div>
                <p class="text-gray-400">
                    Objetivo
                </p>

                <p class="text-white text-lg">
                    {{ $alimentacion->objetivo }}
                </p>
            </div>

            <div>
                <p class="text-gray-400">
                    Calorías diarias
                </p>

                <p class="text-white text-lg">
                    {{ $alimentacion->calorias ?? 'No especificadas' }}

                    @if($alimentacion->calorias)
                        kcal
                    @endif
                </p>
            </div>

            <div>
                <p class="text-gray-400">
                    Estado
                </p>

                @if($alimentacion->estado)

                    <span class="text-green-500 font-semibold">
                        Activo
                    </span>

                @else

                    <span class="text-red-500 font-semibold">
                        Inactivo
                    </span>

                @endif

            </div>

        </div>

        <hr class="my-8 border-gray-700">

        {{-- Alimentación diaria --}}
        <h2 class="text-2xl text-red-500 mb-6">
            Alimentación Diaria
        </h2>

        <div class="grid grid-cols-2 gap-6">

            {{-- Desayuno --}}
            <div class="bg-gray-800 rounded-lg p-5">

                <h3 class="text-xl text-red-400 font-semibold mb-3">
                    🌅 Desayuno
                </h3>

                <p class="text-gray-300 whitespace-pre-line">
                    {{ $alimentacion->desayuno ?? 'No registrado.' }}
                </p>

            </div>

            {{-- Almuerzo --}}
            <div class="bg-gray-800 rounded-lg p-5">

                <h3 class="text-xl text-red-400 font-semibold mb-3">
                    ☀️ Almuerzo
                </h3>

                <p class="text-gray-300 whitespace-pre-line">
                    {{ $alimentacion->almuerzo ?? 'No registrado.' }}
                </p>

            </div>

            {{-- Merienda --}}
            <div class="bg-gray-800 rounded-lg p-5">

                <h3 class="text-xl text-red-400 font-semibold mb-3">
                    🍎 Merienda
                </h3>

                <p class="text-gray-300 whitespace-pre-line">
                    {{ $alimentacion->merienda ?? 'No registrado.' }}
                </p>

            </div>

            {{-- Cena --}}
            <div class="bg-gray-800 rounded-lg p-5">

                <h3 class="text-xl text-red-400 font-semibold mb-3">
                    🌙 Cena
                </h3>

                <p class="text-gray-300 whitespace-pre-line">
                    {{ $alimentacion->cena ?? 'No registrado.' }}
                </p>

            </div>

        </div>

        {{-- Observaciones --}}
        <div class="mt-8">

            <h2 class="text-2xl text-red-500 mb-4">
                Observaciones
            </h2>

            <div class="bg-gray-800 rounded-lg p-5">

                <p class="text-gray-300 whitespace-pre-line">
                    {{ $alimentacion->observaciones ?? 'Sin observaciones.' }}
                </p>

            </div>

        </div>

        {{-- Acciones --}}
        <div class="mt-8 flex gap-3">

            <a href="{{ route('alimentacion.edit', $alimentacion) }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

                Editar Plan

            </a>

            <form action="{{ route('alimentacion.destroy', $alimentacion) }}"
                  method="POST"
                  onsubmit="return confirm('¿Está seguro de eliminar este plan alimenticio?')">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg">

                    Eliminar Plan

                </button>

            </form>

        </div>

    </div>

</div>

@endsection