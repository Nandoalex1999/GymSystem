@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10 px-6">

    {{-- Encabezado --}}
    <div class="flex justify-between items-center mb-8">

        <h1 class="text-3xl font-bold text-red-600">
            Gestión de Clientes
        </h1>

        <a href="{{ route('clientes.create') }}"
           class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg">
            Nuevo Cliente
        </a>

    </div>

    {{-- Tabla --}}
    <div class="overflow-x-auto rounded-xl border border-red-600">

        <table class="w-full text-left">

            <thead class="bg-gray-900 text-red-500">

                <tr>

                    <th class="p-4">ID</th>

                    <th class="p-4">Cédula</th>

                    <th class="p-4">Nombres</th>

                    <th class="p-4">Apellidos</th>

                    <th class="p-4">Teléfono</th>

                    <th class="p-4">Objetivo</th>

                    <th class="p-4">Estado</th>

                    <th class="p-4 whitespace-nowrap">
                        Acciones
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($clientes as $cliente)

                    <tr class="border-b border-gray-800">

                        {{-- ID --}}
                        <td class="p-4">
                            {{ $cliente->id }}
                        </td>

                        {{-- Cédula --}}
                        <td class="p-4">
                            {{ $cliente->cedula }}
                        </td>

                        {{-- Nombres --}}
                        <td class="p-4">
                            {{ $cliente->nombres }}
                        </td>

                        {{-- Apellidos --}}
                        <td class="p-4">
                            {{ $cliente->apellidos }}
                        </td>

                        {{-- Teléfono --}}
                        <td class="p-4">
                            {{ $cliente->telefono }}
                        </td>

                        {{-- Objetivo --}}
                        <td class="p-4">
                            {{ $cliente->objetivo }}
                        </td>

                        {{-- Estado --}}
                        <td class="p-4">

                            @if($cliente->estado)

                                <span class="text-green-600 font-semibold">
                                    Activo
                                </span>

                            @else

                                <span class="text-red-600 font-semibold">
                                    Inactivo
                                </span>

                            @endif

                        </td>

                        {{-- Acciones --}}
                        <td class="p-4 whitespace-nowrap">

                            <div class="flex items-center gap-2">

                                {{-- Editar --}}
                                <a href="{{ route('clientes.edit', $cliente) }}"
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded">

                                    Editar

                                </a>

                                {{-- Eliminar --}}
                                <form action="{{ route('clientes.destroy', $cliente) }}"
                                      method="POST"
                                      class="inline">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirm('¿Está seguro de eliminar este cliente?')"
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded">

                                        Eliminar

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center p-6">

                            No existen clientes registrados.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection