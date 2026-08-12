@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto py-10 px-6">

    {{-- Encabezado --}}
    <div class="mb-8">

        <a
            href="{{ route('cliente.rutinas.index') }}"
            class="text-gray-400 hover:text-red-500 transition">

            ← Volver a mis rutinas

        </a>

        <h1 class="text-3xl font-bold text-red-600 mt-4">
            {{ $rutina->nombre }}
        </h1>

        <p class="text-gray-400 mt-2">
            {{ $rutina->descripcion ?: 'Sin descripción disponible.' }}
        </p>

    </div>


    {{-- Información de la rutina --}}
    <div class="bg-gray-900 border border-gray-700 rounded-xl overflow-hidden">

        <div class="p-5 border-b border-gray-700">

            <h2 class="text-xl font-bold text-white">
                Ejercicios de la Rutina
            </h2>

            <p class="text-gray-400 text-sm mt-1">
                Sigue los ejercicios en el orden indicado.
            </p>

        </div>


        {{-- Lista de ejercicios --}}
        <div class="divide-y divide-gray-800">

            @forelse($rutina->ejercicios as $item)

                <div class="p-6">

                    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">

                        <div>

                            <div class="flex items-center gap-3">

                                <span class="bg-red-600 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold">
                                    {{ $item->orden }}
                                </span>

                                <h3 class="text-lg font-bold text-white">
                                    {{ $item->ejercicio->nombre }}
                                </h3>

                            </div>


                            @if($item->ejercicio->descripcion)

                                <p class="text-gray-400 mt-3">
                                    {{ $item->ejercicio->descripcion }}
                                </p>

                            @endif

                        </div>


                        {{-- Datos del ejercicio --}}
                        <div class="grid grid-cols-3 gap-3 text-center">

                            <div class="bg-gray-800 rounded-lg px-4 py-3">

                                <p class="text-gray-500 text-sm">
                                    Series
                                </p>

                                <p class="text-white font-bold text-lg">
                                    {{ $item->series }}
                                </p>

                            </div>


                            <div class="bg-gray-800 rounded-lg px-4 py-3">

                                <p class="text-gray-500 text-sm">
                                    Reps
                                </p>

                                <p class="text-white font-bold text-lg">
                                    {{ $item->repeticiones }}
                                </p>

                            </div>


                            <div class="bg-gray-800 rounded-lg px-4 py-3">

                                <p class="text-gray-500 text-sm">
                                    Descanso
                                </p>

                                <p class="text-white font-bold text-lg">
                                    {{ $item->descanso }}s
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="p-8 text-center text-gray-400">

                    Esta rutina todavía no tiene ejercicios asignados.

                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection