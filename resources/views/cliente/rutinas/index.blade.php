@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10 px-6">

    {{-- Encabezado --}}
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-red-500">
            Mis Rutinas
        </h1>

        <p class="text-gray-400 mt-2">
            Aquí puedes consultar las rutinas que tienes asignadas.
        </p>

    </div>


    {{-- Información del cliente --}}
    <div class="bg-gray-900 border border-gray-700 rounded-xl p-6 mb-6">

        <h2 class="text-xl font-semibold text-white">
            {{ $cliente->nombres }} {{ $cliente->apellidos }}
        </h2>

        <p class="text-gray-400 mt-1">
            Rutinas asignadas: {{ $rutinas->count() }}
        </p>

    </div>


    {{-- Lista de rutinas --}}
    @if($rutinas->count() > 0)

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($rutinas as $rutina)

                <div class="bg-gray-900 border border-red-600 rounded-xl p-6">

                    <h2 class="text-xl font-bold text-red-500">
                        {{ $rutina->nombre }}
                    </h2>


                    <p class="text-gray-400 mt-3">
                        {{ $rutina->descripcion ?? 'Sin descripción.' }}
                    </p>


                    <div class="mt-5">

                        <p class="text-sm text-gray-500 mb-4">
                            Ejercicios:
                            {{ $rutina->ejercicios->count() }}
                        </p>


                        <a
                            href="{{ route('cliente.rutinas.show', $rutina->id) }}"
                            class="inline-block bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition">

                            Ver rutina

                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        {{-- Cuando el cliente no tiene rutinas --}}
        <div class="bg-gray-900 border border-gray-700 rounded-xl p-8 text-center">

            <h2 class="text-xl font-semibold text-white">
                No tienes rutinas asignadas
            </h2>

            <p class="text-gray-400 mt-2">
                Actualmente no tienes ninguna rutina asignada.
            </p>

        </div>

    @endif

</div>

@endsection