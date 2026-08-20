<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;

class ClienteAlimentacionController extends Controller
{
    /**
     * Mostrar los planes alimenticios del cliente autenticado.
     */
    public function index()
    {
        $cliente = Cliente::where('user_id', Auth::id())
            ->where('estado', true)
            ->firstOrFail();

        $alimentaciones = $cliente->alimentaciones()
            ->where('estado', true)
            ->orderBy('id', 'desc')
            ->get();

        return view(
            'cliente.alimentacion.index',
            compact('cliente', 'alimentaciones')
        );
    }

    /**
     * Mostrar un plan alimenticio específico del cliente.
     */
    public function show($id)
    {
        $cliente = Cliente::where('user_id', Auth::id())
            ->where('estado', true)
            ->firstOrFail();

        $alimentacion = $cliente->alimentaciones()
            ->where('estado', true)
            ->findOrFail($id);

        return view(
            'cliente.alimentacion.show',
            compact('cliente', 'alimentacion')
        );
    }
}