@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10 px-6">

    <h1 class="text-3xl font-bold text-red-600 mb-2">
        Gestionar Rutina
    </h1>

    <h2 class="text-xl text-white mb-8">
        {{ $rutina->nombre }}
    </h2>

    @if(session('success'))
        <div class="bg-green-600 text-white p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-gray-900 border border-red-600 rounded-xl p-8">

        <h3 class="text-2xl text-red-500 mb-6">
            Agregar Ejercicio
        </h3>

        <form action="{{ route('rutinas.agregarEjercicio', $rutina) }}" method="POST">

            @csrf

            <div class="grid grid-cols-2 gap-6">

                <div>
                    <label class="block text-white mb-2">
                        Ejercicio
                    </label>

                    <select
                        name="ejercicio_id"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                        required>

                        <option value="">Seleccione un ejercicio</option>

                        @foreach($ejercicios as $ejercicio)
                            <option value="{{ $ejercicio->id }}">
                                {{ $ejercicio->nombre }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div>
                    <label class="block text-white mb-2">
                        Series
                    </label>

                    <input
                        type="number"
                        name="series"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                        required>
                </div>

                <div>
                    <label class="block text-white mb-2">
                        Repeticiones
                    </label>

                    <input
                        type="number"
                        name="repeticiones"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                        required>
                </div>

                <div>
                    <label class="block text-white mb-2">
                        Descanso (segundos)
                    </label>

                    <input
                        type="number"
                        name="descanso"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                        required>
                </div>

            </div>

            <button
                type="submit"
                class="mt-6 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded">

                Agregar Ejercicio

            </button>

        </form>

        <hr class="my-10 border-gray-700">

        <h3 class="text-2xl text-red-500 mb-6">
            Ejercicios de la Rutina
        </h3>

        <div class="overflow-x-auto">

            <table class="w-full text-white border border-gray-700">

                <thead class="bg-gray-800">

                    <tr>

                        <th class="p-3 text-left">Ejercicio</th>
                        <th class="p-3 text-center">Series</th>
                        <th class="p-3 text-center">Repeticiones</th>
                        <th class="p-3 text-center">Descanso</th>
                        <th class="p-3 text-center">Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($rutinaEjercicios as $item)

                        <tr class="border-t border-gray-700 hover:bg-gray-800">

                            <td class="p-3">
                                {{ $item->ejercicio->nombre }}
                            </td>

                            <td class="p-3 text-center">
                                {{ $item->series }}
                            </td>

                            <td class="p-3 text-center">
                                {{ $item->repeticiones }}
                            </td>

                            <td class="p-3 text-center">
                                {{ $item->descanso }} s
                            </td>

                            <td class="p-3 text-center">

                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('rutinas.editarEjercicio', $item) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">

                                        Editar

                                    </a>

                                    <form action="{{ route('rutinas.eliminarEjercicio', $item) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            onclick="return confirm('¿Desea eliminar este ejercicio de la rutina?')"
                                            class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded text-white">

                                            Eliminar

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center p-6 text-gray-400">
                                No hay ejercicios agregados a esta rutina.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection