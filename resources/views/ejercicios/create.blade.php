@extends('layouts.app')

@section('content')

<div class="container mx-auto px-6 py-8">

    <h1 class="text-4xl font-bold text-red-500 mb-8">
        Nuevo Ejercicio
    </h1>

    <div class="bg-gray-900 border border-red-500 rounded-lg p-8">

        <form action="{{ route('ejercicios.store') }}" method="POST">

            @csrf

            <div class="mb-5">

                <label class="block text-white mb-2">
                    Nombre del Ejercicio
                </label>

                <input
                    type="text"
                    name="nombre"
                    class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"
                    required>

            </div>

            <div class="mb-5">

                <label class="block text-white mb-2">
                    Grupo Muscular
                </label>

                <select
                    name="grupo_muscular"
                    class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3">

                    <option>Pecho</option>
                    <option>Espalda</option>
                    <option>Piernas</option>
                    <option>Hombros</option>
                    <option>Bíceps</option>
                    <option>Tríceps</option>
                    <option>Abdomen</option>
                    <option>Cardio</option>

                </select>

            </div>

            <div class="mb-8">

                <label class="block text-white mb-2">
                    Descripción
                </label>

                <textarea
                    name="descripcion"
                    rows="4"
                    class="w-full rounded bg-gray-800 border border-gray-700 text-white p-3"></textarea>

            </div>

            <div class="flex gap-4">

                <button
                    type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded">

                    Guardar Ejercicio

                </button>

                <a
                    href="{{ route('ejercicios.index') }}"
                    class="bg-gray-700 hover:bg-gray-800 text-white px-6 py-3 rounded">

                    Cancelar

                </a>

            </div>

        </form>

    </div>

</div>

@endsection