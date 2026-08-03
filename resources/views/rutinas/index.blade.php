@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10 px-6">

    <div class="flex justify-between items-center mb-8">

        <h1 class="text-3xl font-bold text-red-600">
            Gestión de Rutinas
        </h1>

        <a href="{{ route('rutinas.create') }}"
           class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg">

            Nueva Rutina

        </a>

    </div>

    <div class="overflow-hidden rounded-xl border border-red-600">

        <table class="w-full text-left">

            <thead class="bg-gray-900 text-red-500">

                <tr>
                    <th class="p-4">ID</th>
                    <th class="p-4">Nombre</th>
                    <th class="p-4">Descripción</th>
                    <th class="p-4">Acciones</th>
                </tr>

            </thead>

            <tbody>

                @forelse($rutinas as $rutina)

                <tr class="border-b border-gray-800">

                    <td class="p-4">{{ $rutina->id }}</td>
                    <td class="p-4">{{ $rutina->nombre }}</td>
                    <td class="p-4">{{ $rutina->descripcion }}</td>

                    <td class="p-4">

                        <!-- Botón Editar -->
                        <a href="{{ route('rutinas.edit', $rutina) }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded">

                            Editar

                        </a>

                        <!-- Botón Gestionar -->
                        <a href="{{ route('rutinas.gestionar', $rutina) }}"
                           class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded ml-2">

                            Gestionar

                        </a>

                        <!-- Botón Eliminar -->
                        <form action="{{ route('rutinas.destroy', $rutina) }}"
                              method="POST"
                              class="inline">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                onclick="return confirm('¿Deseas eliminar esta rutina?')"
                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded ml-2">

                                Eliminar

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4" class="text-center p-6">

                        No existen rutinas registradas.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection