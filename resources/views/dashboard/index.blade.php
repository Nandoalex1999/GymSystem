@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-12 px-6">

    @if(Auth::user()->role->nombre === 'Administrador')

        <!-- =========================
             DASHBOARD ADMINISTRADOR
        ========================== -->

        <div class="mb-10">

            <h1 class="text-4xl font-bold text-red-600">
                Panel de Administración
            </h1>

            <p class="text-gray-400 mt-2 text-lg">
                Bienvenido a GymSystem.
            </p>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Usuarios -->
            <a href="{{ route('usuarios.index') }}"
               class="bg-gray-900 rounded-xl p-6 border border-red-600
                      hover:bg-gray-800 hover:scale-105
                      transition duration-300">

                <div class="flex items-center gap-3">
                    <span class="text-3xl">👤</span>

                    <h2 class="text-red-500 font-bold text-xl">
                        Usuarios
                    </h2>
                </div>

                <p class="mt-4 text-gray-400">
                    Gestionar usuarios del sistema.
                </p>

            </a>


            <!-- Ejercicios -->
            <a href="{{ route('ejercicios.index') }}"
               class="bg-gray-900 rounded-xl p-6 border border-red-600
                      hover:bg-gray-800 hover:scale-105
                      transition duration-300">

                <div class="flex items-center gap-3">
                    <span class="text-3xl">💪</span>

                    <h2 class="text-red-500 font-bold text-xl">
                        Ejercicios
                    </h2>
                </div>

                <p class="mt-4 text-gray-400">
                    Administrar ejercicios del gimnasio.
                </p>

            </a>


            <!-- Rutinas -->
            <a href="{{ route('rutinas.index') }}"
               class="bg-gray-900 rounded-xl p-6 border border-red-600
                      hover:bg-gray-800 hover:scale-105
                      transition duration-300">

                <div class="flex items-center gap-3">
                    <span class="text-3xl">📋</span>

                    <h2 class="text-red-500 font-bold text-xl">
                        Rutinas
                    </h2>
                </div>

                <p class="mt-4 text-gray-400">
                    Administración de rutinas y ejercicios.
                </p>

            </a>


            <!-- Clientes -->
            <a href="{{ route('clientes.index') }}"
               class="bg-gray-900 rounded-xl p-6 border border-red-600
                      hover:bg-gray-800 hover:scale-105
                      transition duration-300">

                <div class="flex items-center gap-3">
                    <span class="text-3xl">🏋️</span>

                    <h2 class="text-red-500 font-bold text-xl">
                        Clientes
                    </h2>
                </div>

                <p class="mt-4 text-gray-400">
                    Gestionar clientes del gimnasio.
                </p>

            </a>


            <!-- Alimentación -->
            <a href="{{ route('alimentacion.index') }}"
               class="bg-gray-900 rounded-xl p-6 border border-red-600
                      hover:bg-gray-800 hover:scale-105
                      transition duration-300">

                <div class="flex items-center gap-3">
                    <span class="text-3xl">🍽️</span>

                    <h2 class="text-red-500 font-bold text-xl">
                        Alimentación
                    </h2>
                </div>

                <p class="mt-4 text-gray-400">
                    Gestionar planes alimenticios.
                </p>

            </a>


            <!-- Reportes -->
            <a href="{{ route('reportes.index') }}"
               class="bg-gray-900 rounded-xl p-6 border border-red-600
                      hover:bg-gray-800 hover:scale-105
                      transition duration-300">

                <div class="flex items-center gap-3">
                    <span class="text-3xl">📊</span>

                    <h2 class="text-red-500 font-bold text-xl">
                        Reportes
                    </h2>
                </div>

                <p class="mt-4 text-gray-400">
                    Consultar estadísticas y reportes del sistema.
                </p>

            </a>

        </div>

    @else

        <!-- =========================
             DASHBOARD USUARIO FINAL
        ========================== -->

        <div class="mb-10">

            <h1 class="text-4xl font-bold text-red-600">
                Mi Panel
            </h1>

            <p class="text-gray-400 mt-2 text-lg">
                Bienvenido a GymSystem. Consulta tu entrenamiento, alimentación y progreso.
            </p>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Mis Rutinas -->
            <a href="{{ route('cliente.rutinas.index') }}"
               class="bg-gray-900 rounded-xl p-6 border border-red-600
                      hover:bg-gray-800 hover:scale-105
                      transition duration-300">

                <div class="flex items-center gap-3">

                    <span class="text-3xl">📋</span>

                    <h2 class="text-red-500 font-bold text-xl">
                        Mis Rutinas
                    </h2>

                </div>

                <p class="mt-4 text-gray-400">
                    Consulta tus rutinas y ejercicios asignados.
                </p>

            </a>


            <!-- Mi Alimentación -->
            <a href="{{ route('cliente.alimentacion.index') }}"
               class="bg-gray-900 rounded-xl p-6 border border-red-600
                      hover:bg-gray-800 hover:scale-105
                      transition duration-300">

                <div class="flex items-center gap-3">

                    <span class="text-3xl">🍽️</span>

                    <h2 class="text-red-500 font-bold text-xl">
                        Mi Alimentación
                    </h2>

                </div>

                <p class="mt-4 text-gray-400">
                    Consulta tu plan de alimentación asignado.
                </p>

            </a>


            <!-- Mi Seguimiento -->
            <a href="{{ route('cliente.seguimiento.index') }}"
               class="bg-gray-900 rounded-xl p-6 border border-red-600
                      hover:bg-gray-800 hover:scale-105
                      transition duration-300">

                <div class="flex items-center gap-3">

                    <span class="text-3xl">📈</span>

                    <h2 class="text-red-500 font-bold text-xl">
                        Mi Seguimiento
                    </h2>

                </div>

                <p class="mt-4 text-gray-400">
                    Registra y consulta la evolución de tu peso y medidas corporales.
                </p>

            </a>

        </div>

    @endif


    <!-- Información del sistema -->
    <div class="mt-10 bg-gray-900 rounded-xl border border-gray-700 p-6">

        <h2 class="text-xl font-bold text-red-500">
            GymSystem
        </h2>

        <p class="text-gray-400 mt-2">
            Sistema web para la gestión de entrenamiento físico,
            alimentación y seguimiento de clientes.
        </p>

    </div>

</div>

@endsection