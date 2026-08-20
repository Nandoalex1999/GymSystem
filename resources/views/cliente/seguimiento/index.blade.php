@extends('layouts.app')

@section('content')

<div class="container mx-auto px-6 py-8">

    {{-- Encabezado --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>
            <h1 class="text-4xl font-bold text-red-500">
                Mi Progreso
            </h1>

            <p class="text-gray-400 mt-2">
                Registra y consulta la evolución de tu peso y medidas corporales.
            </p>
        </div>

        <a href="{{ route('cliente.seguimiento.create') }}"
           class="bg-red-500 hover:bg-red-600 text-white font-semibold px-5 py-3 rounded-lg transition">
            + Registrar progreso
        </a>

    </div>


    {{-- Mensaje de éxito --}}
    @if(session('success'))

        <div class="bg-green-900 border border-green-500 text-green-200 rounded-lg p-4 mb-6">
            {{ session('success') }}
        </div>

    @endif


    {{-- Información actual --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-gray-900 border border-red-500 rounded-xl p-6">
            <p class="text-gray-400">
                Peso actual
            </p>

            <p class="text-3xl font-bold text-white mt-2">
                {{ $cliente->peso_actual ?? 'No registrado' }}
                @if($cliente->peso_actual)
                    <span class="text-lg text-gray-400">kg</span>
                @endif
            </p>
        </div>


        <div class="bg-gray-900 border border-gray-600 rounded-xl p-6">
            <p class="text-gray-400">
                Altura
            </p>

            <p class="text-3xl font-bold text-white mt-2">
                {{ $cliente->altura ?? 'No registrada' }}
                @if($cliente->altura)
                    <span class="text-lg text-gray-400">m</span>
                @endif
            </p>
        </div>


        <div class="bg-gray-900 border border-gray-600 rounded-xl p-6">
            <p class="text-gray-400">
                Objetivo
            </p>

            <p class="text-xl font-bold text-white mt-3">
                {{ $cliente->objetivo ?? 'No especificado' }}
            </p>
        </div>

    </div>


    {{-- GRÁFICO DE EVOLUCIÓN --}}
    @if($seguimientos->count() > 0)

        <div class="bg-gray-900 border border-gray-600 rounded-xl p-6 mb-8">

            <h2 class="text-2xl font-bold text-white">
                Evolución de Peso
            </h2>

            <p class="text-gray-400 mt-1 mb-6">
                Visualiza cómo ha cambiado tu peso con el paso del tiempo.
            </p>

            <div class="relative h-80">
                <canvas id="graficoPeso"></canvas>
            </div>

        </div>

    @endif


    {{-- Historial --}}
    <div class="bg-gray-900 border border-gray-600 rounded-xl overflow-hidden">

        <div class="p-6 border-b border-gray-700">

            <h2 class="text-2xl font-bold text-white">
                Historial de Progreso
            </h2>

            <p class="text-gray-400 mt-1">
                Consulta tus registros corporales anteriores.
            </p>

        </div>


        @if($seguimientos->count() > 0)

            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead class="bg-gray-800 text-gray-300">

                        <tr>
                            <th class="px-6 py-4">Fecha</th>
                            <th class="px-6 py-4">Peso</th>
                            <th class="px-6 py-4">Pecho</th>
                            <th class="px-6 py-4">Cintura</th>
                            <th class="px-6 py-4">Brazo</th>
                            <th class="px-6 py-4">Pierna</th>
                            <th class="px-6 py-4">Observaciones</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($seguimientos as $seguimiento)

                            <tr class="border-t border-gray-700 text-gray-300 hover:bg-gray-800 transition">

                                <td class="px-6 py-4">
                                    {{ $seguimiento->fecha->format('d/m/Y') }}
                                </td>

                                <td class="px-6 py-4 font-semibold text-white">
                                    {{ $seguimiento->peso }} kg
                                </td>

                                <td class="px-6 py-4">
                                    {{ $seguimiento->pecho ?? '-' }} cm
                                </td>

                                <td class="px-6 py-4">
                                    {{ $seguimiento->cintura ?? '-' }} cm
                                </td>

                                <td class="px-6 py-4">
                                    {{ $seguimiento->brazo ?? '-' }} cm
                                </td>

                                <td class="px-6 py-4">
                                    {{ $seguimiento->pierna ?? '-' }} cm
                                </td>

                                <td class="px-6 py-4">
                                    {{ $seguimiento->observaciones ?? '-' }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="p-10 text-center">

                <p class="text-gray-400 text-lg">
                    Aún no tienes registros de progreso.
                </p>

                <p class="text-gray-500 mt-2">
                    Registra tu primer seguimiento para comenzar a controlar tu evolución.
                </p>

            </div>

        @endif

    </div>

</div>


{{-- CHART.JS --}}
@if($seguimientos->count() > 0)

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('graficoPeso');

        new Chart(ctx, {
            type: 'line',

            data: {
                labels: [
                    @foreach($seguimientos->sortBy('fecha') as $seguimiento)
                        '{{ $seguimiento->fecha->format('d/m/Y') }}',
                    @endforeach
                ],

                datasets: [{
                    label: 'Peso (kg)',

                    data: [
                        @foreach($seguimientos->sortBy('fecha') as $seguimiento)
                            {{ $seguimiento->peso }},
                        @endforeach
                    ],

                    borderColor: '#ef4444',
                    backgroundColor: 'rgba(239, 68, 68, 0.15)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.3,

                    pointBackgroundColor: '#ef4444',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointRadius: 5
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,

                plugins: {
                    legend: {
                        labels: {
                            color: '#ffffff'
                        }
                    }
                },

                scales: {
                    x: {
                        ticks: {
                            color: '#d1d5db'
                        },

                        grid: {
                            color: '#374151'
                        }
                    },

                    y: {
                        beginAtZero: false,

                        ticks: {
                            color: '#d1d5db'
                        },

                        grid: {
                            color: '#374151'
                        }
                    }
                }
            }
        });
    </script>

@endif

@endsection