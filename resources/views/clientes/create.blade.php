@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto py-10 px-6">

    <h1 class="text-3xl font-bold text-red-600 mb-8">
        Nuevo Cliente
    </h1>

    <form action="{{ route('clientes.store') }}" method="POST">

        @csrf

        <div class="grid grid-cols-2 gap-6">

            <div>
                <label class="block mb-2 font-semibold">Cédula</label>
                <input type="text" name="cedula"
                    class="w-full rounded border border-gray-500 bg-gray-900 text-white p-2"
                    value="{{ old('cedula') }}">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Nombres</label>
                <input type="text" name="nombres"
                    class="w-full rounded border border-gray-500 bg-gray-900 text-white p-2"
                    value="{{ old('nombres') }}">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Apellidos</label>
                <input type="text" name="apellidos"
                    class="w-full rounded border border-gray-500 bg-gray-900 text-white p-2"
                    value="{{ old('apellidos') }}">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento"
                    class="w-full rounded border border-gray-500 bg-gray-900 text-white p-2"
                    value="{{ old('fecha_nacimiento') }}">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Sexo</label>

                <select name="sexo"
                    class="w-full rounded border border-gray-500 bg-gray-900 text-white p-2">

                    <option value="">Seleccione...</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>

                </select>

            </div>

            <div>
                <label class="block mb-2 font-semibold">Teléfono</label>
                <input type="text" name="telefono"
                    class="w-full rounded border border-gray-500 bg-gray-900 text-white p-2"
                    value="{{ old('telefono') }}">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Correo</label>
                <input type="email" name="correo"
                    class="w-full rounded border border-gray-500 bg-gray-900 text-white p-2"
                    value="{{ old('correo') }}">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Dirección</label>
                <input type="text" name="direccion"
                    class="w-full rounded border border-gray-500 bg-gray-900 text-white p-2"
                    value="{{ old('direccion') }}">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Altura</label>
                <input type="number" step="0.01" name="altura"
                    class="w-full rounded border border-gray-500 bg-gray-900 text-white p-2"
                    value="{{ old('altura') }}">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Peso actual</label>
                <input type="number" step="0.01" name="peso_actual"
                    class="w-full rounded border border-gray-500 bg-gray-900 text-white p-2"
                    value="{{ old('peso_actual') }}">
            </div>

            <div class="col-span-2">
                <label class="block mb-2 font-semibold">Objetivo</label>
                <input type="text" name="objetivo"
                    class="w-full rounded border border-gray-500 bg-gray-900 text-white p-2"
                    value="{{ old('objetivo') }}">
            </div>

        </div>

        <div class="mt-8">

            <button
                class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg">

                Guardar Cliente

            </button>

        </div>

    </form>

</div>

@endsection