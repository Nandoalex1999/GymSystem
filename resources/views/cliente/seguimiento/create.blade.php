@extends('layouts.app')

@section('content')

<style>
    .progreso-container {
        max-width: 900px;
        margin: 40px auto;
        padding: 0 20px;
        color: #e5e7eb;
    }

    .progreso-titulo {
        font-size: 38px;
        font-weight: bold;
        color: #ff4d4d;
        margin-bottom: 8px;
    }

    .progreso-subtitulo {
        font-size: 18px;
        color: #aab4c3;
        margin-bottom: 15px;
    }

    .volver {
        display: inline-block;
        color: #ffffff;
        text-decoration: none;
        margin-bottom: 25px;
        font-size: 16px;
    }

    .volver:hover {
        color: #ff4d4d;
    }

    .form-card {
        background: #182233;
        border: 1px solid #374151;
        border-radius: 14px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group.full-width {
        grid-column: span 2;
    }

    .form-group label {
        color: #d1d5db;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-control {
        width: 100%;
        box-sizing: border-box;
        background: #0f172a;
        color: #ffffff;
        border: 1px solid #475569;
        border-radius: 8px;
        padding: 12px 14px;
        font-size: 16px;
        outline: none;
    }

    .form-control:focus {
        border-color: #ff4d4d;
        box-shadow: 0 0 0 2px rgba(255, 77, 77, 0.15);
    }

    .form-control::placeholder {
        color: #94a3b8;
        opacity: 1;
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .acciones {
        display: flex;
        gap: 15px;
        margin-top: 30px;
    }

    .btn-guardar {
        background: #e52626;
        color: white;
        border: none;
        padding: 13px 25px;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
    }

    .btn-guardar:hover {
        background: #c91d1d;
    }

    .btn-cancelar {
        background: #293548;
        color: white;
        text-decoration: none;
        padding: 13px 25px;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
    }

    .btn-cancelar:hover {
        background: #374151;
    }

    .error-box {
        background: rgba(220, 38, 38, 0.15);
        border: 1px solid #dc2626;
        color: #fecaca;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .error-box ul {
        margin: 0;
        padding-left: 20px;
    }

    @media (max-width: 700px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full-width {
            grid-column: span 1;
        }

        .progreso-titulo {
            font-size: 30px;
        }

        .acciones {
            flex-direction: column;
        }

        .btn-guardar,
        .btn-cancelar {
            text-align: center;
        }
    }
</style>

<div class="progreso-container">

    <h1 class="progreso-titulo">Registrar Progreso</h1>

    <p class="progreso-subtitulo">
        Registra tus medidas corporales para llevar el seguimiento de tu evolución.
    </p>

    <a href="{{ route('cliente.seguimiento.index') }}" class="volver">
        ← Volver a Mi Progreso
    </a>

    @if ($errors->any())
        <div class="error-box">
            <strong>Por favor corrige los siguientes errores:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-card">

        <form action="{{ route('cliente.seguimiento.store') }}" method="POST">

            @csrf

            <div class="form-grid">

                {{-- FECHA --}}
                <div class="form-group">
                    <label for="fecha">Fecha</label>

                    <input
                        type="date"
                        name="fecha"
                        id="fecha"
                        class="form-control"
                        value="{{ old('fecha', date('Y-m-d')) }}"
                        required
                    >
                </div>

                {{-- PESO --}}
                <div class="form-group">
                    <label for="peso">Peso (kg)</label>

                    <input
                        type="number"
                        step="0.01"
                        name="peso"
                        id="peso"
                        class="form-control"
                        placeholder="Ejemplo: 80.50"
                        value="{{ old('peso') }}"
                        required
                    >
                </div>

                {{-- PECHO --}}
                <div class="form-group">
                    <label for="pecho">Pecho (cm)</label>

                    <input
                        type="number"
                        step="0.01"
                        name="pecho"
                        id="pecho"
                        class="form-control"
                        placeholder="Ejemplo: 100"
                        value="{{ old('pecho') }}"
                    >
                </div>

                {{-- CINTURA --}}
                <div class="form-group">
                    <label for="cintura">Cintura (cm)</label>

                    <input
                        type="number"
                        step="0.01"
                        name="cintura"
                        id="cintura"
                        class="form-control"
                        placeholder="Ejemplo: 85"
                        value="{{ old('cintura') }}"
                    >
                </div>

                {{-- CADERA --}}
                <div class="form-group">
                    <label for="cadera">Cadera (cm)</label>

                    <input
                        type="number"
                        step="0.01"
                        name="cadera"
                        id="cadera"
                        class="form-control"
                        placeholder="Ejemplo: 95"
                        value="{{ old('cadera') }}"
                    >
                </div>

                {{-- BRAZO --}}
                <div class="form-group">
                    <label for="brazo">Brazo (cm)</label>

                    <input
                        type="number"
                        step="0.01"
                        name="brazo"
                        id="brazo"
                        class="form-control"
                        placeholder="Ejemplo: 35"
                        value="{{ old('brazo') }}"
                    >
                </div>

                {{-- PIERNA --}}
                <div class="form-group">
                    <label for="pierna">Pierna (cm)</label>

                    <input
                        type="number"
                        step="0.01"
                        name="pierna"
                        id="pierna"
                        class="form-control"
                        placeholder="Ejemplo: 60"
                        value="{{ old('pierna') }}"
                    >
                </div>

                {{-- OBSERVACIONES --}}
                <div class="form-group full-width">
                    <label for="observaciones">Observaciones</label>

                    <textarea
                        name="observaciones"
                        id="observaciones"
                        class="form-control"
                        placeholder="Ejemplo: Me siento con más energía y he mejorado mi rendimiento."
                    >{{ old('observaciones') }}</textarea>
                </div>

            </div>

            <div class="acciones">

                <button type="submit" class="btn-guardar">
                    Guardar Progreso
                </button>

                <a href="{{ route('cliente.seguimiento.index') }}"
                   class="btn-cancelar">
                    Cancelar
                </a>

            </div>

        </form>

    </div>

</div>

@endsection