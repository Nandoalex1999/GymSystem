@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto py-10 px-6">

    <h1 class="text-3xl font-bold text-red-600 mb-8">
        Editar Ejercicio de la Rutina
    </h1>

    <div class="bg-gray-900 border border-red-600 rounded-xl p-8">

        <form action="{{ route('rutinas.actualizarEjercicio', $rutinaEjercicio) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-6">
                <label class="block text-white mb-2">Ejercicio</label>

                <input
                    type="text"
                    value="{{ $rutinaEjercicio->ejercicio->nombre }}"
                    class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                    readonly>
            </div>

            <div class="grid grid-cols-3 gap-6">

                <div>
                    <label class="block text-white mb-2">Series</label>

                    <input
                        type="number"
                        name="series"
                        value="{{ $rutinaEjercicio->series }}"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                        required>
                </div>

                <div>
                    <label class="block text-white mb-2">Repeticiones</label>

                    <input
                        type="number"
                        name="repeticiones"
                        value="{{ $rutinaEjercicio->repeticiones }}"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                        required>
                </div>

                <div>
                    <label class="block text-white mb-2">Descanso</label>

                    <input
                        type="number"
                        name="descanso"
                        value="{{ $rutinaEjercicio->descanso }}"
                        class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                        required>
                </div>

            </div>

            <div class="mt-8 flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded">

                    Guardar Cambios

                </button>

                <a href="{{ route('rutinas.gestionar', $rutinaEjercicio->rutina_id) }}"
                   class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded">

                    Cancelar

                </a>

            </div>

        </form>

    </div>

</div>

@endsection