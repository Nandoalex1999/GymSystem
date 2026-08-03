@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10 px-6">

    <div class="flex justify-between items-center mb-8">

        <h1 class="text-3xl font-bold text-red-600">
            Gestión de Clientes
        </h1>

        <a href="{{ route('clientes.create') }}"
           class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg">
            Nuevo Cliente
        </a>

    </div>

    <div class="overflow-hidden rounded-xl border border-red-600">

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
                    <th class="p-4">Acciones</th>
                </tr>
            </thead>

            <tbody>

                @forelse($clientes as $cliente)

                    <tr class="border-b border-gray-800">

                        <td class="p-4">{{ $cliente->id }}</td>

                        <td class="p-4">{{ $cliente->cedula }}</td>

                        <td class="p-4">{{ $cliente->nombres }}</td>

                        <td class="p-4">{{ $cliente->apellidos }}</td>

                        <td class="p-4">{{ $cliente->telefono }}</td>

                        <td class="p-4">{{ $cliente->objetivo }}</td>

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

                        <td class="p-4">

                            <a href="{{ route('clientes.edit', $cliente) }}"
                               class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">
                                Editar
                            </a>

                            <form action="{{ route('clientes.destroy', $cliente) }}"
                                  method="POST"
                                  class="inline"
                                  onsubmit="return confirm('¿Está seguro de eliminar este cliente?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded ml-2">

                                    Eliminar

                                </button>

                            </form>

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