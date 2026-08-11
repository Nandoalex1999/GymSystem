<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cliente;
use App\Models\Ejercicio;
use App\Models\Rutina;
use App\Models\RutinaEjercicio;
use App\Models\Alimentacion;

class ReporteController extends Controller
{
    /**
     * Mostrar reportes y estadísticas del sistema.
     */
    public function index()
    {
        // ==========================================
        // ESTADÍSTICAS GENERALES
        // ==========================================

        $totalUsuarios = User::count();

        $totalClientes = Cliente::count();

        $totalEjercicios = Ejercicio::count();

        $totalRutinas = Rutina::count();

        $totalAlimentaciones = Alimentacion::count();


        // ==========================================
        // ESTADO DE CLIENTES
        // ==========================================

        $clientesActivos = Cliente::where('estado', true)->count();

        $clientesInactivos = Cliente::where('estado', false)->count();


        // ==========================================
        // PORCENTAJES DE CLIENTES
        // ==========================================

        $porcentajeClientesActivos = $totalClientes > 0
            ? round(($clientesActivos / $totalClientes) * 100)
            : 0;

        $porcentajeClientesInactivos = $totalClientes > 0
            ? round(($clientesInactivos / $totalClientes) * 100)
            : 0;


        // ==========================================
        // CLIENTES POR OBJETIVO
        // ==========================================

        $clientesPorObjetivo = Cliente::selectRaw(
            'objetivo, COUNT(*) as total'
        )
            ->groupBy('objetivo')
            ->orderByDesc('total')
            ->get();


        // ==========================================
        // EJERCICIOS POR GRUPO MUSCULAR
        // ==========================================

        $ejerciciosPorGrupo = Ejercicio::selectRaw(
            'grupo_muscular, COUNT(*) as total'
        )
            ->groupBy('grupo_muscular')
            ->orderByDesc('total')
            ->get();


        // ==========================================
        // RESUMEN DE RUTINAS
        // ==========================================

        $rutinasConEjercicios = Rutina::whereHas(
            'ejercicios'
        )->count();

        $rutinasSinEjercicios = Rutina::whereDoesntHave(
            'ejercicios'
        )->count();

        $ejerciciosAsignados = RutinaEjercicio::count();


        // ==========================================
        // RESUMEN DE ALIMENTACIÓN
        // ==========================================

        $alimentacionesActivas = Alimentacion::where(
            'estado',
            true
        )->count();

        $alimentacionesInactivas = Alimentacion::where(
            'estado',
            false
        )->count();


        // ==========================================
        // PORCENTAJES DE ALIMENTACIÓN
        // ==========================================

        $porcentajeAlimentacionesActivas = $totalAlimentaciones > 0
            ? round(($alimentacionesActivas / $totalAlimentaciones) * 100)
            : 0;

        $porcentajeAlimentacionesInactivas = $totalAlimentaciones > 0
            ? round(($alimentacionesInactivas / $totalAlimentaciones) * 100)
            : 0;


        // ==========================================
        // ENVIAR DATOS A LA VISTA
        // ==========================================

        return view('reportes.index', compact(

            // Estadísticas generales
            'totalUsuarios',
            'totalClientes',
            'totalEjercicios',
            'totalRutinas',
            'totalAlimentaciones',

            // Clientes
            'clientesActivos',
            'clientesInactivos',
            'porcentajeClientesActivos',
            'porcentajeClientesInactivos',

            // Objetivos
            'clientesPorObjetivo',

            // Ejercicios
            'ejerciciosPorGrupo',

            // Rutinas
            'rutinasConEjercicios',
            'rutinasSinEjercicios',
            'ejerciciosAsignados',

            // Alimentación
            'alimentacionesActivas',
            'alimentacionesInactivas',
            'porcentajeAlimentacionesActivas',
            'porcentajeAlimentacionesInactivas'

        ));
    }
}