@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10 px-6">

    {{-- ========================================== --}}
    {{-- ENCABEZADO --}}
    {{-- ========================================== --}}

    <div class="flex justify-between items-center mb-10">

        <div>

            <h1 class="text-4xl font-bold text-red-600">
                Reportes y Estadísticas
            </h1>

            <p class="text-gray-400 mt-2">
                Resumen general de la información registrada en GymSystem.
            </p>

        </div>

        <a
            href="{{ route('dashboard') }}"
            class="bg-gray-800 hover:bg-gray-700 text-white px-5 py-3 rounded-lg transition">

            Volver al Dashboard

        </a>

    </div>


    {{-- ========================================== --}}
    {{-- ESTADÍSTICAS GENERALES --}}
    {{-- ========================================== --}}

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        {{-- USUARIOS --}}
        <div class="bg-gray-900 rounded-xl p-6 border border-red-600">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-400">
                        Total de Usuarios
                    </p>

                    <h2 class="text-4xl font-bold text-red-500 mt-2">
                        {{ $totalUsuarios }}
                    </h2>

                </div>

                <div class="text-5xl">
                    👤
                </div>

            </div>

        </div>


        {{-- CLIENTES --}}
        <div class="bg-gray-900 rounded-xl p-6 border border-red-600">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-400">
                        Total de Clientes
                    </p>

                    <h2 class="text-4xl font-bold text-red-500 mt-2">
                        {{ $totalClientes }}
                    </h2>

                </div>

                <div class="text-5xl">
                    🏋️
                </div>

            </div>

        </div>


        {{-- EJERCICIOS --}}
        <div class="bg-gray-900 rounded-xl p-6 border border-red-600">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-400">
                        Total de Ejercicios
                    </p>

                    <h2 class="text-4xl font-bold text-red-500 mt-2">
                        {{ $totalEjercicios }}
                    </h2>

                </div>

                <div class="text-5xl">
                    💪
                </div>

            </div>

        </div>


        {{-- RUTINAS --}}
        <div class="bg-gray-900 rounded-xl p-6 border border-red-600">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-400">
                        Total de Rutinas
                    </p>

                    <h2 class="text-4xl font-bold text-red-500 mt-2">
                        {{ $totalRutinas }}
                    </h2>

                </div>

                <div class="text-5xl">
                    📋
                </div>

            </div>

        </div>


        {{-- ALIMENTACIÓN --}}
        <div class="bg-gray-900 rounded-xl p-6 border border-red-600">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-400">
                        Planes Alimenticios
                    </p>

                    <h2 class="text-4xl font-bold text-red-500 mt-2">
                        {{ $totalAlimentaciones }}
                    </h2>

                </div>

                <div class="text-5xl">
                    🍽️
                </div>

            </div>

        </div>


        {{-- CLIENTES ACTIVOS --}}
        <div class="bg-gray-900 rounded-xl p-6 border border-green-600">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-400">
                        Clientes Activos
                    </p>

                    <h2 class="text-4xl font-bold text-green-500 mt-2">
                        {{ $clientesActivos }}
                    </h2>

                </div>

                <div class="text-5xl">
                    🟢
                </div>

            </div>

        </div>

    </div>


    {{-- ========================================== --}}
    {{-- ESTADO DE CLIENTES --}}
    {{-- ========================================== --}}

    <div class="mt-10 bg-gray-900 rounded-xl border border-red-600 p-6">

        <h2 class="text-2xl font-bold text-red-500 mb-8">
            Estado de Clientes
        </h2>


        {{-- CLIENTES ACTIVOS --}}
        <div class="mb-8">

            <div class="flex justify-between mb-3">

                <div class="flex items-center gap-2">

                    <span class="text-xl">
                        🟢
                    </span>

                    <span class="text-white">
                        Clientes activos
                    </span>

                </div>

                <span class="text-green-500 font-bold">

                    {{ $clientesActivos }}
                    ({{ $porcentajeClientesActivos }}%)

                </span>

            </div>


            <div class="w-full bg-gray-800 rounded-full h-5">

                <div
                    class="bg-green-500 h-5 rounded-full transition-all duration-500"
                    style="width: {{ $porcentajeClientesActivos }}%">
                </div>

            </div>

        </div>


        {{-- CLIENTES INACTIVOS --}}
        <div>

            <div class="flex justify-between mb-3">

                <div class="flex items-center gap-2">

                    <span class="text-xl">
                        🔴
                    </span>

                    <span class="text-white">
                        Clientes inactivos
                    </span>

                </div>

                <span class="text-red-500 font-bold">

                    {{ $clientesInactivos }}
                    ({{ $porcentajeClientesInactivos }}%)

                </span>

            </div>


            <div class="w-full bg-gray-800 rounded-full h-5">

                <div
                    class="bg-red-500 h-5 rounded-full transition-all duration-500"
                    style="width: {{ $porcentajeClientesInactivos }}%">
                </div>

            </div>

        </div>

    </div>


    {{-- ========================================== --}}
    {{-- CLIENTES POR OBJETIVO --}}
    {{-- ========================================== --}}

    <div class="mt-8 bg-gray-900 rounded-xl border border-red-600 p-6">

        <h2 class="text-2xl font-bold text-red-500 mb-8">
            Clientes por Objetivo
        </h2>


        @if($clientesPorObjetivo->count() > 0)

            @php
                $maxObjetivo = $clientesPorObjetivo->max('total');
            @endphp

            @foreach($clientesPorObjetivo as $objetivo)

                @php
                    $porcentaje = $maxObjetivo > 0
                        ? round(($objetivo->total / $maxObjetivo) * 100)
                        : 0;
                @endphp

                <div class="mb-7">

                    <div class="flex justify-between mb-3">

                        <span class="text-white">
                            🎯 {{ $objetivo->objetivo }}
                        </span>

                        <span class="text-red-500 font-bold">

                            {{ $objetivo->total }}

                            {{ $objetivo->total == 1
                                ? 'cliente'
                                : 'clientes'
                            }}

                        </span>

                    </div>


                    <div class="w-full bg-gray-800 rounded-full h-5">

                        <div
                            class="bg-red-600 h-5 rounded-full transition-all duration-500"
                            style="width: {{ $porcentaje }}%">
                        </div>

                    </div>

                </div>

            @endforeach

        @else

            <p class="text-gray-400">
                No existen clientes registrados.
            </p>

        @endif

    </div>


    {{-- ========================================== --}}
    {{-- EJERCICIOS POR GRUPO MUSCULAR --}}
    {{-- ========================================== --}}

    <div class="mt-8 bg-gray-900 rounded-xl border border-red-600 p-6">

        <h2 class="text-2xl font-bold text-red-500 mb-8">
            Ejercicios por Grupo Muscular
        </h2>


        @if($ejerciciosPorGrupo->count() > 0)

            @php
                $maxGrupo = $ejerciciosPorGrupo->max('total');
            @endphp

            @foreach($ejerciciosPorGrupo as $grupo)

                @php
                    $porcentaje = $maxGrupo > 0
                        ? round(($grupo->total / $maxGrupo) * 100)
                        : 0;
                @endphp

                <div class="mb-7">

                    <div class="flex justify-between mb-3">

                        <span class="text-white">
                            💪 {{ $grupo->grupo_muscular }}
                        </span>

                        <span class="text-red-500 font-bold">

                            {{ $grupo->total }}

                            {{ $grupo->total == 1
                                ? 'ejercicio'
                                : 'ejercicios'
                            }}

                        </span>

                    </div>


                    <div class="w-full bg-gray-800 rounded-full h-5">

                        <div
                            class="bg-red-600 h-5 rounded-full transition-all duration-500"
                            style="width: {{ $porcentaje }}%">
                        </div>

                    </div>

                </div>

            @endforeach

        @else

            <p class="text-gray-400">
                No existen ejercicios registrados.
            </p>

        @endif

    </div>


    {{-- ========================================== --}}
    {{-- RESUMEN DE RUTINAS --}}
    {{-- ========================================== --}}

    <div class="mt-8 bg-gray-900 rounded-xl border border-red-600 p-6">

        <h2 class="text-2xl font-bold text-red-500 mb-6">
            Resumen de Rutinas
        </h2>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- TOTAL --}}
            <div class="bg-gray-800 rounded-lg p-5">

                <p class="text-gray-400">
                    Total de rutinas
                </p>

                <p class="text-3xl font-bold text-white mt-2">
                    {{ $totalRutinas }}
                </p>

            </div>


            {{-- CON EJERCICIOS --}}
            <div class="bg-gray-800 rounded-lg p-5">

                <p class="text-gray-400">
                    Rutinas con ejercicios
                </p>

                <p class="text-3xl font-bold text-green-500 mt-2">
                    {{ $rutinasConEjercicios }}
                </p>

            </div>


            {{-- SIN EJERCICIOS --}}
            <div class="bg-gray-800 rounded-lg p-5">

                <p class="text-gray-400">
                    Rutinas sin ejercicios
                </p>

                <p class="text-3xl font-bold text-red-500 mt-2">
                    {{ $rutinasSinEjercicios }}
                </p>

            </div>

        </div>


        {{-- EJERCICIOS ASIGNADOS --}}
        <div class="mt-6 bg-gray-800 rounded-lg p-5">

            <p class="text-gray-400">
                Ejercicios asignados a rutinas
            </p>

            <p class="text-3xl font-bold text-red-500 mt-2">
                {{ $ejerciciosAsignados }}
            </p>

        </div>

    </div>


    {{-- ========================================== --}}
    {{-- RESUMEN DE ALIMENTACIÓN --}}
    {{-- ========================================== --}}

    <div class="mt-8 bg-gray-900 rounded-xl border border-red-600 p-6">

        <h2 class="text-2xl font-bold text-red-500 mb-8">
            Resumen de Alimentación
        </h2>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- PLANES REGISTRADOS --}}
            <div class="bg-gray-800 rounded-lg p-5">

                <p class="text-gray-400">
                    Planes registrados
                </p>

                <p class="text-3xl font-bold text-white mt-2">
                    {{ $totalAlimentaciones }}
                </p>

            </div>


            {{-- PLANES ACTIVOS --}}
            <div class="bg-gray-800 rounded-lg p-5">

                <p class="text-gray-400">
                    Planes activos
                </p>

                <p class="text-3xl font-bold text-green-500 mt-2">
                    {{ $alimentacionesActivas }}
                </p>

            </div>


            {{-- PLANES INACTIVOS --}}
            <div class="bg-gray-800 rounded-lg p-5">

                <p class="text-gray-400">
                    Planes inactivos
                </p>

                <p class="text-3xl font-bold text-red-500 mt-2">
                    {{ $alimentacionesInactivas }}
                </p>

            </div>

        </div>


        {{-- PLANES ACTIVOS --}}
        <div class="mt-8">

            <div class="flex justify-between mb-3">

                <span class="text-white">
                    🟢 Planes activos
                </span>

                <span class="text-green-500 font-bold">

                    {{ $alimentacionesActivas }}
                    ({{ $porcentajeAlimentacionesActivas }}%)

                </span>

            </div>


            <div class="w-full bg-gray-800 rounded-full h-5">

                <div
                    class="bg-green-500 h-5 rounded-full transition-all duration-500"
                    style="width: {{ $porcentajeAlimentacionesActivas }}%">
                </div>

            </div>

        </div>


        {{-- PLANES INACTIVOS --}}
        <div class="mt-7">

            <div class="flex justify-between mb-3">

                <span class="text-white">
                    🔴 Planes inactivos
                </span>

                <span class="text-red-500 font-bold">

                    {{ $alimentacionesInactivas }}
                    ({{ $porcentajeAlimentacionesInactivas }}%)

                </span>

            </div>


            <div class="w-full bg-gray-800 rounded-full h-5">

                <div
                    class="bg-red-500 h-5 rounded-full transition-all duration-500"
                    style="width: {{ $porcentajeAlimentacionesInactivas }}%">
                </div>

            </div>

        </div>

    </div>


    {{-- ========================================== --}}
    {{-- RESUMEN DE CLIENTES --}}
    {{-- ========================================== --}}

    <div class="mt-8 bg-gray-900 rounded-xl border border-red-600 p-6">

        <h2 class="text-2xl font-bold text-red-500 mb-6">
            Resumen de Clientes
        </h2>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- REGISTRADOS --}}
            <div class="bg-gray-800 rounded-lg p-5">

                <p class="text-gray-400">
                    Clientes registrados
                </p>

                <p class="text-3xl font-bold text-white mt-2">
                    {{ $totalClientes }}
                </p>

            </div>


            {{-- ACTIVOS --}}
            <div class="bg-gray-800 rounded-lg p-5">

                <p class="text-gray-400">
                    Clientes activos
                </p>

                <p class="text-3xl font-bold text-green-500 mt-2">
                    {{ $clientesActivos }}
                </p>

            </div>


            {{-- INACTIVOS --}}
            <div class="bg-gray-800 rounded-lg p-5">

                <p class="text-gray-400">
                    Clientes inactivos
                </p>

                <p class="text-3xl font-bold text-red-500 mt-2">
                    {{ $clientesInactivos }}
                </p>

            </div>

        </div>

    </div>

</div>

@endsection