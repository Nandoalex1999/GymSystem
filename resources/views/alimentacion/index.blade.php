@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10 px-6">

    {{-- Encabezado --}}
    <div class="flex justify-between items-center mb-8">

        <h1 class="text-3xl font-bold text-red-600">
            Gestión de Alimentación
        </h1>

        <a href="{{ route('alimentacion.create') }}"
           class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg">

            Nuevo Plan Alimenticio

        </a>

    </div>

    {{-- Mensaje de éxito --}}
    @if(session('success'))

        <div class="bg-green-600 text-white p-4 rounded-lg mb-6">

            {{ session('success') }}

        </div>

    @endif

    {{-- Tabla --}}
    <div class="overflow-x-auto rounded-xl border border-red-600">

        <table class="w-full text-left">

            <thead class="bg-gray-900 text-red-500">

                <tr>

                    <th class="p-4">ID</th>

                    <th class="p-4">Cliente</th>

                    <th class="p-4">Plan</th>

                    <th class="p-4">Objetivo</th>

                    <th class="p-4">Calorías</th>

                    <th class="p-4">Estado</th>

                    <th class="p-4">Acciones</th>

                </tr>

            </thead>

            <tbody>

                @forelse($alimentaciones as $alimentacion)

                    <tr class="border-b border-gray-800">

                        {{-- ID --}}
                        <td class="p-4">
                            {{ $alimentacion->id }}
                        </td>

                        {{-- Cliente --}}
                        <td class="p-4">

                            {{ $alimentacion->cliente->nombres }}
                            {{ $alimentacion->cliente->apellidos }}

                        </td>

                        {{-- Nombre del plan --}}
                        <td class="p-4">
                            {{ $alimentacion->nombre_plan }}
                        </td>

                        {{-- Objetivo --}}
                        <td class="p-4">
                            {{ $alimentacion->objetivo }}
                        </td>

                        {{-- Calorías --}}
                        <td class="p-4">

                            @if($alimentacion->calorias)

                                {{ $alimentacion->calorias }} kcal

                            @else

                                No especificado

                            @endif

                        </td>

                        {{-- Estado --}}
                        <td class="p-4">

                            @if($alimentacion->estado)

                                <span class="text-green-500 font-semibold">
                                    Activo
                                </span>

                            @else

                                <span class="text-red-500 font-semibold">
                                    Inactivo
                                </span>

                            @endif

                        </td>

                        {{-- Acciones --}}
                        <td class="p-4">

                            <div class="flex items-center gap-2">

                                {{-- Ver --}}
                                <a href="{{ route('alimentacion.show', $alimentacion) }}"
                                   class="bg-gray-600 hover:bg-gray-700 text-white px-3 py-2 rounded-lg">

                                    Ver

                                </a>

                                {{-- Editar --}}
                                <a href="{{ route('alimentacion.edit', $alimentacion) }}"
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg">

                                    Editar

                                </a>

                                {{-- Eliminar --}}
                                <form action="{{ route('alimentacion.destroy', $alimentacion) }}"
                                      method="POST"
                                      onsubmit="return confirm('¿Está seguro de eliminar este plan alimenticio?')">

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

                        <td colspan="7" class="text-center p-6 text-gray-400">

                            No existen planes alimenticios registrados.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection