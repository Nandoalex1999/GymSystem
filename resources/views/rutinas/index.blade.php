@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10 px-6">

    {{-- Encabezado --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">

        <div>

            <h1 class="text-3xl font-bold text-red-600">
                Gestión de Rutinas
            </h1>

            <p class="text-gray-400 mt-2">
                Administra las rutinas y los ejercicios asignados.
            </p>

        </div>


        <a href="{{ route('rutinas.create') }}"
           class="bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-lg transition duration-300">

            + Nueva Rutina

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


    {{-- Tabla --}}
    <div class="overflow-x-auto rounded-xl border border-red-600 bg-gray-900">

        <table class="w-full text-left">

            <thead class="bg-gray-800 text-red-500">

                <tr>

                    <th class="p-4">
                        ID
                    </th>

                    <th class="p-4">
                        Nombre
                    </th>

                    <th class="p-4">
                        Descripción
                    </th>

                    <th class="p-4 whitespace-nowrap">
                        Acciones
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($rutinas as $rutina)

                    <tr class="border-b border-gray-800 hover:bg-gray-800 transition">

                        {{-- ID --}}
                        <td class="p-4 text-white">
                            {{ $rutina->id }}
                        </td>


                        {{-- Nombre --}}
                        <td class="p-4 text-gray-200 font-semibold">
                            {{ $rutina->nombre }}
                        </td>


                        {{-- Descripción --}}
                        <td class="p-4 text-gray-400">
                            {{ $rutina->descripcion ?: 'Sin descripción' }}
                        </td>


                        {{-- Acciones --}}
                        <td class="p-4 whitespace-nowrap">

                            <div class="flex items-center gap-2">


                                {{-- Editar --}}
                                <a href="{{ route('rutinas.edit', $rutina) }}"
                                   class="bg-blue-600 hover:bg-blue-700
                                          text-white px-3 py-2 rounded-lg
                                          transition">

                                    Editar

                                </a>


                                {{-- Gestionar --}}
                                <a href="{{ route('rutinas.gestionar', $rutina) }}"
                                   class="bg-green-600 hover:bg-green-700
                                          text-white px-3 py-2 rounded-lg
                                          transition">

                                    Gestionar

                                </a>


                                {{-- Eliminar --}}
                                <form
                                    action="{{ route('rutinas.destroy', $rutina) }}"
                                    method="POST"
                                    class="inline"
                                    onsubmit="return confirm('¿Deseas eliminar esta rutina?')">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="bg-red-600 hover:bg-red-700
                                               text-white px-3 py-2 rounded-lg
                                               transition">

                                        Eliminar

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4"
                            class="text-center p-8 text-gray-400">

                            No existen rutinas registradas.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection