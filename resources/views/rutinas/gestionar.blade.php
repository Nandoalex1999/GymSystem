@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10 px-6">

    {{-- Encabezado --}}
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-red-600">
            Gestionar Rutina
        </h1>

        <h2 class="text-xl text-white mt-2">
            {{ $rutina->nombre }}
        </h2>

        @if($rutina->descripcion)

            <p class="text-gray-400 mt-2">
                {{ $rutina->descripcion }}
            </p>

        @endif

    </div>


    {{-- Mensaje de éxito --}}
    @if(session('success'))

        <div class="mb-6 bg-green-900 border border-green-600
                    text-green-300 p-4 rounded-lg">

            {{ session('success') }}

        </div>

    @endif


    {{-- Mensaje de error --}}
    @if(session('error'))

        <div class="mb-6 bg-red-900 border border-red-600
                    text-red-300 p-4 rounded-lg">

            {{ session('error') }}

        </div>

    @endif


    {{-- Errores de validación --}}
    @if($errors->any())

        <div class="mb-6 bg-red-900 border border-red-600
                    text-red-200 p-5 rounded-lg">

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


    {{-- ========================================== --}}
    {{-- AGREGAR EJERCICIO --}}
    {{-- ========================================== --}}

    <div class="bg-gray-900 border border-red-600 rounded-xl p-6">

        <h3 class="text-2xl font-bold text-red-500 mb-6">
            Agregar Ejercicio
        </h3>


        <form action="{{ route('rutinas.agregarEjercicio', $rutina) }}"
              method="POST">

            @csrf


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                {{-- Ejercicio --}}
                <div class="md:col-span-2">

                    <label for="ejercicio_id"
                           class="block text-white font-semibold mb-2">

                        Ejercicio

                    </label>

                    <select
                        id="ejercicio_id"
                        name="ejercicio_id"
                        required
                        class="w-full rounded-lg bg-gray-800
                               border border-gray-600 text-white p-3
                               focus:border-red-600 focus:ring-red-600">

                        <option value="">
                            Seleccione un ejercicio
                        </option>

                        @foreach($ejercicios as $ejercicio)

                            <option
                                value="{{ $ejercicio->id }}"
                                {{ old('ejercicio_id') == $ejercicio->id ? 'selected' : '' }}>

                                {{ $ejercicio->nombre }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Series --}}
                <div>

                    <label for="series"
                           class="block text-white font-semibold mb-2">

                        Series

                    </label>

                    <input
                        type="number"
                        id="series"
                        name="series"
                        min="1"
                        value="{{ old('series') }}"
                        required
                        placeholder="Ej. 3"
                        class="w-full rounded-lg bg-gray-800
                               border border-gray-600 text-white p-3
                               focus:border-red-600 focus:ring-red-600">

                </div>


                {{-- Repeticiones --}}
                <div>

                    <label for="repeticiones"
                           class="block text-white font-semibold mb-2">

                        Repeticiones

                    </label>

                    <input
                        type="number"
                        id="repeticiones"
                        name="repeticiones"
                        min="1"
                        value="{{ old('repeticiones') }}"
                        required
                        placeholder="Ej. 12"
                        class="w-full rounded-lg bg-gray-800
                               border border-gray-600 text-white p-3
                               focus:border-red-600 focus:ring-red-600">

                </div>


                {{-- Descanso --}}
                <div>

                    <label for="descanso"
                           class="block text-white font-semibold mb-2">

                        Descanso (segundos)

                    </label>

                    <input
                        type="number"
                        id="descanso"
                        name="descanso"
                        min="0"
                        value="{{ old('descanso') }}"
                        required
                        placeholder="Ej. 90"
                        class="w-full rounded-lg bg-gray-800
                               border border-gray-600 text-white p-3
                               focus:border-red-600 focus:ring-red-600">

                </div>

            </div>


            <button
                type="submit"
                class="mt-6 bg-green-600 hover:bg-green-700
                       text-white font-semibold px-6 py-3
                       rounded-lg transition duration-300">

                + Agregar Ejercicio

            </button>

        </form>

    </div>


    {{-- ========================================== --}}
    {{-- EJERCICIOS DE LA RUTINA --}}
    {{-- ========================================== --}}

    <div class="mt-8 bg-gray-900 border border-red-600 rounded-xl p-6">

        <div class="flex flex-col md:flex-row
                    md:justify-between md:items-center
                    gap-3 mb-6">

            <h3 class="text-2xl font-bold text-red-500">
                Ejercicios de la Rutina
            </h3>

            <span class="text-gray-400">

                {{ $rutinaEjercicios->count() }}

                {{ $rutinaEjercicios->count() == 1
                    ? 'ejercicio'
                    : 'ejercicios'
                }}

            </span>

        </div>


        <div class="overflow-x-auto">

            <table class="w-full text-white">

                <thead class="bg-gray-800">

                    <tr>

                        <th class="p-4 text-left">
                            #
                        </th>

                        <th class="p-4 text-left">
                            Ejercicio
                        </th>

                        <th class="p-4 text-center">
                            Series
                        </th>

                        <th class="p-4 text-center">
                            Repeticiones
                        </th>

                        <th class="p-4 text-center">
                            Descanso
                        </th>

                        <th class="p-4 text-center">
                            Acciones
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($rutinaEjercicios as $item)

                        <tr class="border-t border-gray-700
                                   hover:bg-gray-800 transition">


                            {{-- Orden --}}
                            <td class="p-4 text-gray-400">

                                {{ $item->orden }}

                            </td>


                            {{-- Ejercicio --}}
                            <td class="p-4 font-semibold">

                                {{ $item->ejercicio->nombre }}

                            </td>


                            {{-- Series --}}
                            <td class="p-4 text-center">

                                {{ $item->series }}

                            </td>


                            {{-- Repeticiones --}}
                            <td class="p-4 text-center">

                                {{ $item->repeticiones }}

                            </td>


                            {{-- Descanso --}}
                            <td class="p-4 text-center">

                                {{ $item->descanso }} s

                            </td>


                            {{-- Acciones --}}
                            <td class="p-4">

                                <div class="flex justify-center
                                            items-center gap-2">


                                    {{-- Editar --}}
                                    <a
                                        href="{{ route('rutinas.editarEjercicio', $item) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600
                                               text-white px-4 py-2
                                               rounded-lg transition">

                                        Editar

                                    </a>


                                    {{-- Eliminar --}}
                                    <form
                                        action="{{ route('rutinas.eliminarEjercicio', $item) }}"
                                        method="POST"
                                        onsubmit="return confirm('¿Desea eliminar este ejercicio de la rutina?')">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="bg-red-600 hover:bg-red-700
                                                   text-white px-4 py-2
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
                                colspan="6"
                                class="text-center p-8 text-gray-400">

                                No hay ejercicios agregados a esta rutina.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- Volver --}}
    <div class="mt-6">

        <a
            href="{{ route('rutinas.index') }}"
            class="inline-block bg-gray-700 hover:bg-gray-600
                   text-white px-5 py-3 rounded-lg transition">

            ← Volver a Rutinas

        </a>

    </div>

</div>

@endsection