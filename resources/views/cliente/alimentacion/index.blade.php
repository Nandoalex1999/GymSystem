@extends('layouts.app')

@section('content')

<div class="container mx-auto px-6 py-8">

    <h1 class="text-4xl font-bold text-red-500 mb-2">
        Mi Alimentación
    </h1>

    <p class="text-gray-400 mb-8">
        Aquí puedes consultar los planes alimenticios que tienes asignados.
    </p>


    {{-- Información del cliente --}}
    <div class="bg-gray-900 border border-gray-600 rounded-xl p-6 mb-8">

        <h2 class="text-2xl font-bold text-white mb-2">
            {{ $cliente->nombres }} {{ $cliente->apellidos }}
        </h2>

        <p class="text-gray-400">
            Planes alimenticios asignados: {{ $alimentaciones->count() }}
        </p>

    </div>


    {{-- Lista de planes --}}
    @if($alimentaciones->count() > 0)

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($alimentaciones as $alimentacion)

                <div class="bg-gray-900 border border-red-500 rounded-xl p-6">

                    <h2 class="text-2xl font-bold text-red-400 mb-3">
                        {{ $alimentacion->nombre_plan }}
                    </h2>


                    <div class="space-y-3 text-gray-300">

                        <div>
                            <span class="font-semibold text-white">
                                Objetivo:
                            </span>

                            {{ $alimentacion->objetivo }}
                        </div>


                        @if($alimentacion->calorias)
                            <div>
                                <span class="font-semibold text-white">
                                    Calorías diarias:
                                </span>

                                {{ $alimentacion->calorias }} kcal
                            </div>
                        @endif


                        <div>
                            <span class="font-semibold text-white">
                                Estado:
                            </span>

                            <span class="text-green-400">
                                Activo
                            </span>
                        </div>

                    </div>


                    <div class="mt-6">

                        <a href="{{ route('cliente.alimentacion.show', $alimentacion->id) }}"
                           class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold px-5 py-3 rounded-lg transition">

                            Ver plan

                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="bg-gray-900 border border-gray-600 rounded-xl p-8 text-center">

            <h2 class="text-xl font-bold text-white mb-3">
                No tienes planes alimenticios asignados
            </h2>

            <p class="text-gray-400">
                Actualmente no existe ningún plan alimenticio activo asignado a tu cuenta.
            </p>

        </div>

    @endif

</div>

@endsection