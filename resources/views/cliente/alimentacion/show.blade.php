@extends('layouts.app')

@section('content')

<div class="container mx-auto px-6 py-8">

    {{-- Volver --}}
    <a href="{{ route('cliente.alimentacion.index') }}"
       class="inline-block text-gray-400 hover:text-red-500 mb-6 transition">
        ← Volver a mi alimentación
    </a>


    {{-- Encabezado --}}
    <h1 class="text-4xl font-bold text-red-500 mb-2">
        {{ $alimentacion->nombre_plan }}
    </h1>

    <p class="text-gray-400 mb-8">
        {{ $alimentacion->objetivo }}
    </p>


    {{-- Información general --}}
    <div class="bg-gray-900 border border-gray-600 rounded-xl p-6 mb-8">

        <h2 class="text-2xl font-bold text-white mb-4">
            Información del Plan
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div class="bg-gray-800 rounded-lg p-4">
                <p class="text-gray-400 text-sm">
                    Objetivo
                </p>

                <p class="text-white font-semibold mt-1">
                    {{ $alimentacion->objetivo }}
                </p>
            </div>

            <div class="bg-gray-800 rounded-lg p-4">
                <p class="text-gray-400 text-sm">
                    Calorías diarias
                </p>

                <p class="text-white font-semibold mt-1">
                    {{ $alimentacion->calorias ?? 'No especificadas' }}
                    @if($alimentacion->calorias)
                        kcal
                    @endif
                </p>
            </div>

        </div>

    </div>


    {{-- Alimentación diaria --}}
    <div class="bg-gray-900 border border-red-500 rounded-xl overflow-hidden">

        <div class="p-6 border-b border-gray-700">

            <h2 class="text-2xl font-bold text-red-400">
                Alimentación Diaria
            </h2>

            <p class="text-gray-400 mt-1">
                Sigue las recomendaciones indicadas para cada comida.
            </p>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">

            {{-- Desayuno --}}
            <div class="bg-gray-800 rounded-xl p-5">

                <h3 class="text-xl font-bold text-white mb-3">
                    🌅 Desayuno
                </h3>

                <p class="text-gray-300 whitespace-pre-line">
                    {{ $alimentacion->desayuno ?: 'No especificado.' }}
                </p>

            </div>


            {{-- Almuerzo --}}
            <div class="bg-gray-800 rounded-xl p-5">

                <h3 class="text-xl font-bold text-white mb-3">
                    🍽️ Almuerzo
                </h3>

                <p class="text-gray-300 whitespace-pre-line">
                    {{ $alimentacion->almuerzo ?: 'No especificado.' }}
                </p>

            </div>


            {{-- Merienda --}}
            <div class="bg-gray-800 rounded-xl p-5">

                <h3 class="text-xl font-bold text-white mb-3">
                    🍎 Merienda
                </h3>

                <p class="text-gray-300 whitespace-pre-line">
                    {{ $alimentacion->merienda ?: 'No especificada.' }}
                </p>

            </div>


            {{-- Cena --}}
            <div class="bg-gray-800 rounded-xl p-5">

                <h3 class="text-xl font-bold text-white mb-3">
                    🌙 Cena
                </h3>

                <p class="text-gray-300 whitespace-pre-line">
                    {{ $alimentacion->cena ?: 'No especificada.' }}
                </p>

            </div>

        </div>

    </div>


    {{-- Observaciones --}}
    @if($alimentacion->observaciones)

        <div class="bg-gray-900 border border-gray-600 rounded-xl p-6 mt-8">

            <h2 class="text-2xl font-bold text-white mb-3">
                Observaciones
            </h2>

            <p class="text-gray-300 whitespace-pre-line">
                {{ $alimentacion->observaciones }}
            </p>

        </div>

    @endif

</div>

@endsection