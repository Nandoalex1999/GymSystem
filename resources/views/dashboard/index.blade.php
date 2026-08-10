@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-12 px-6">

    <h1 class="text-4xl font-bold text-red-600">
        Panel de Administración
    </h1>

    <p class="text-gray-400 mt-2">
        Bienvenido a GymSystem.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">

        <!-- Usuarios -->
        <a href="{{ route('usuarios.index') }}"
           class="bg-gray-900 rounded-xl p-6 border border-red-600 hover:bg-gray-800 hover:scale-105 transition duration-300">

            <h2 class="text-red-500 font-bold text-xl">
                👤 Usuarios
            </h2>

            <p class="mt-3 text-gray-400">
                Gestionar usuarios del sistema.
            </p>

        </a>


        <!-- Ejercicios -->
        <a href="{{ route('ejercicios.index') }}"
           class="bg-gray-900 rounded-xl p-6 border border-red-600 hover:bg-gray-800 hover:scale-105 transition duration-300">

            <h2 class="text-red-500 font-bold text-xl">
                💪 Ejercicios
            </h2>

            <p class="mt-3 text-gray-400">
                Administrar ejercicios del gimnasio.
            </p>

        </a>


        <!-- Rutinas -->
        <a href="{{ route('rutinas.index') }}"
           class="bg-gray-900 rounded-xl p-6 border border-red-600 hover:bg-gray-800 hover:scale-105 transition duration-300">

            <h2 class="text-red-500 font-bold text-xl">
                📋 Rutinas
            </h2>

            <p class="mt-3 text-gray-400">
                Administración de rutinas.
            </p>

        </a>


        <!-- Clientes -->
        <a href="{{ route('clientes.index') }}"
           class="bg-gray-900 rounded-xl p-6 border border-red-600 hover:bg-gray-800 hover:scale-105 transition duration-300">

            <h2 class="text-red-500 font-bold text-xl">
                🏋️ Clientes
            </h2>

            <p class="mt-3 text-gray-400">
                Gestionar clientes del gimnasio.
            </p>

        </a>


        <!-- Alimentación -->
<a href="{{ route('alimentacion.index') }}"
   class="bg-gray-900 rounded-xl p-6 border border-red-600 hover:bg-gray-800 hover:scale-105 transition duration-300">

    <h2 class="text-red-500 font-bold text-xl">
        🍽️ Alimentación
    </h2>

    <p class="mt-3 text-gray-400">
        Gestionar planes alimenticios.
    </p>

</a>


        <!-- Reportes -->
        <div class="bg-gray-900 rounded-xl p-6 border border-gray-700 opacity-70 cursor-not-allowed">

            <h2 class="text-red-500 font-bold text-xl">
                📊 Reportes
            </h2>

            <p class="mt-3 text-gray-400">
                Próximamente.
            </p>

        </div>

    </div>

</div>

@endsection