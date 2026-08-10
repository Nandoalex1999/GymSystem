@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10 px-6">

    <div class="flex justify-between items-center mb-8">

        <h1 class="text-3xl font-bold text-red-600">
            Gestión de Ejercicios
        </h1>

        <a href="{{ route('ejercicios.create') }}"
           class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg">

            Nuevo Ejercicio

        </a>

    </div>

    <div class="overflow-hidden rounded-xl border border-red-600">

        <table class="w-full text-left">

            <thead class="bg-gray-900 text-red-500">

                <tr>

                    <th class="p-4">ID</th>

                    <th class="p-4">Nombre</th>

                    <th class="p-4">Grupo Muscular</th>

                    <th class="p-4">Descripción</th>

                    <th class="p-4">Acciones</th>

                </tr>

            </thead>

            <tbody>

            @forelse($ejercicios as $ejercicio)

                <tr class="border-b border-gray-800">

                    <td class="p-4">
                        {{ $ejercicio->id }}
                    </td>

                    <td class="p-4">
                        {{ $ejercicio->nombre }}
                    </td>

                    <td class="p-4">
                        {{ $ejercicio->grupo_muscular }}
                    </td>

                    <td class="p-4">
                        {{ $ejercicio->descripcion }}
                    </td>

                    <td class="p-4">

                        <div class="flex items-center gap-2">

                            {{-- Botón Editar --}}
                            <a href="{{ route('ejercicios.edit', $ejercicio) }}"
                               class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg">

                                Editar

                            </a>

                            {{-- Botón Eliminar --}}
                            <form action="{{ route('ejercicios.destroy', $ejercicio) }}"
                                  method="POST"
                                  onsubmit="return confirm('¿Está seguro de eliminar este ejercicio?')">

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg">

                                    Eliminar

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center p-6">

                        No existen ejercicios registrados.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection