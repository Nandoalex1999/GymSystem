@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10 px-6">

    {{-- Encabezado --}}
    <div class="flex flex-col md:flex-row md:justify-between
                md:items-center gap-4 mb-8">

        <div>

            <h1 class="text-3xl font-bold text-red-600">
                Gestión de Alimentación
            </h1>

            <p class="text-gray-400 mt-2">
                Administración de los planes alimenticios de GymSystem.
            </p>

        </div>


        <a href="{{ route('alimentacion.create') }}"
           class="bg-red-600 hover:bg-red-700
                  text-white px-5 py-3 rounded-lg
                  transition duration-300">

            + Nuevo Plan Alimenticio

        </a>

    </div>


    {{-- Mensaje de éxito --}}
    @if(session('success'))

        <div class="mb-6 bg-green-900 border border-green-600
                    text-green-300 px-5 py-4 rounded-lg">

            {{ session('success') }}

        </div>

    @endif


    {{-- Mensaje de error --}}
    @if(session('error'))

        <div class="mb-6 bg-red-900 border border-red-600
                    text-red-300 px-5 py-4 rounded-lg">

            {{ session('error') }}

        </div>

    @endif


    {{-- Errores de validación --}}
    @if($errors->any())

        <div class="mb-6 bg-red-900 border border-red-600
                    text-red-200 px-5 py-4 rounded-lg">

            <p class="font-bold mb-2">
                Se encontraron los siguientes errores:
            </p>

            <ul class="list-disc list-inside">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- Tabla --}}
    <div class="overflow-x-auto rounded-xl
                border border-red-600 bg-gray-900">

        <table class="w-full text-left">

            <thead class="bg-gray-800 text-red-500">

                <tr>

                    <th class="p-4">
                        ID
                    </th>

                    <th class="p-4">
                        Cliente
                    </th>

                    <th class="p-4">
                        Plan
                    </th>

                    <th class="p-4">
                        Objetivo
                    </th>

                    <th class="p-4">
                        Calorías
                    </th>

                    <th class="p-4">
                        Estado
                    </th>

                    <th class="p-4 whitespace-nowrap">
                        Acciones
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($alimentaciones as $alimentacion)

                    <tr class="border-b border-gray-800
                               hover:bg-gray-800 transition">


                        {{-- ID --}}
                        <td class="p-4 text-white">

                            {{ $alimentacion->id }}

                        </td>


                        {{-- Cliente --}}
                        <td class="p-4 text-gray-300">

                            @if($alimentacion->cliente)

                                {{ $alimentacion->cliente->nombres }}
                                {{ $alimentacion->cliente->apellidos }}

                            @else

                                <span class="text-red-400">
                                    Cliente no disponible
                                </span>

                            @endif

                        </td>


                        {{-- Nombre del plan --}}
                        <td class="p-4 text-gray-200 font-semibold">

                            {{ $alimentacion->nombre_plan }}

                        </td>


                        {{-- Objetivo --}}
                        <td class="p-4 text-gray-300">

                            {{ $alimentacion->objetivo }}

                        </td>


                        {{-- Calorías --}}
                        <td class="p-4 text-gray-300">

                            @if($alimentacion->calorias)

                                {{ $alimentacion->calorias }} kcal

                            @else

                                <span class="text-gray-500">
                                    No especificado
                                </span>

                            @endif

                        </td>


                        {{-- Estado --}}
                        <td class="p-4">

                            @if($alimentacion->estado)

                                <span class="inline-block
                                             bg-green-900
                                             text-green-300
                                             px-3 py-1
                                             rounded-full
                                             text-sm font-semibold">

                                    Activo

                                </span>

                            @else

                                <span class="inline-block
                                             bg-red-900
                                             text-red-300
                                             px-3 py-1
                                             rounded-full
                                             text-sm font-semibold">

                                    Inactivo

                                </span>

                            @endif

                        </td>


                        {{-- Acciones --}}
                        <td class="p-4 whitespace-nowrap">

                            <div class="flex items-center gap-2">


                                {{-- Ver --}}
                                <a
                                    href="{{ route('alimentacion.show', $alimentacion) }}"
                                    class="bg-gray-600 hover:bg-gray-700
                                           text-white px-3 py-2
                                           rounded-lg transition">

                                    Ver

                                </a>


                                {{-- Editar --}}
                                <a
                                    href="{{ route('alimentacion.edit', $alimentacion) }}"
                                    class="bg-blue-600 hover:bg-blue-700
                                           text-white px-3 py-2
                                           rounded-lg transition">

                                    Editar

                                </a>


                                {{-- Eliminar --}}
                                <form
                                    action="{{ route('alimentacion.destroy', $alimentacion) }}"
                                    method="POST"
                                    class="inline"
                                    onsubmit="return confirm('¿Está seguro de eliminar este plan alimenticio?')">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="bg-red-600 hover:bg-red-700
                                               text-white px-3 py-2
                                               rounded-lg transition">

                                        Eliminar

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="7"
                            class="text-center p-8 text-gray-400">

                            No existen planes alimenticios registrados.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection