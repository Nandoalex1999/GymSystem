<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;

class ClienteRutinaController extends Controller
{
    /**
     * Mostrar las rutinas del cliente que inició sesión.
     */
    public function index()
    {
        $cliente = Cliente::where('user_id', Auth::id())
            ->where('estado', true)
            ->firstOrFail();

        $rutinas = $cliente->rutinas()
            ->with('ejercicios.ejercicio')
            ->orderBy('id', 'desc')
            ->get();

        return view(
            'cliente.rutinas.index',
            compact('cliente', 'rutinas')
        );
    }

    /**
     * Mostrar una rutina específica del cliente.
     */
    public function show($id)
    {
        $cliente = Cliente::where('user_id', Auth::id())
            ->where('estado', true)
            ->firstOrFail();

        $rutina = $cliente->rutinas()
            ->with('ejercicios.ejercicio')
            ->findOrFail($id);

        return view(
            'cliente.rutinas.show',
            compact('cliente', 'rutina')
        );
    }
}