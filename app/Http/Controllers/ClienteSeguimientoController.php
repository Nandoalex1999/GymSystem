<?php

namespace App\Http\Controllers;

use App\Models\Seguimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteSeguimientoController extends Controller
{
    /**
     * Mostrar el historial de progreso del cliente.
     */
    public function index()
    {
        $cliente = Auth::user()->cliente;

        if (!$cliente) {
            abort(403, 'No tienes un perfil de cliente asociado.');
        }

        $seguimientos = Seguimiento::where('cliente_id', $cliente->id)
            ->orderByDesc('fecha')
            ->get();

        return view(
            'cliente.seguimiento.index',
            compact('cliente', 'seguimientos')
        );
    }

    /**
     * Mostrar el formulario para registrar progreso.
     */
    public function create()
    {
        $cliente = Auth::user()->cliente;

        if (!$cliente) {
            abort(403, 'No tienes un perfil de cliente asociado.');
        }

        return view(
            'cliente.seguimiento.create',
            compact('cliente')
        );
    }

    /**
     * Guardar un nuevo registro de progreso.
     */
    public function store(Request $request)
    {
        $cliente = Auth::user()->cliente;

        if (!$cliente) {
            abort(403, 'No tienes un perfil de cliente asociado.');
        }

        $request->validate([
            'fecha' => 'required|date',
            'peso' => 'required|numeric|min:1|max:500',
            'altura' => 'nullable|numeric|min:0.5|max:3',
            'pecho' => 'nullable|numeric|min:1|max:300',
            'cintura' => 'nullable|numeric|min:1|max:300',
            'cadera' => 'nullable|numeric|min:1|max:300',
            'brazo' => 'nullable|numeric|min:1|max:100',
            'pierna' => 'nullable|numeric|min:1|max:150',
            'observaciones' => 'nullable|string|max:1000',
        ]);

        Seguimiento::create([
            'cliente_id' => $cliente->id,
            'fecha' => $request->fecha,
            'peso' => $request->peso,
            'altura' => $request->altura,
            'pecho' => $request->pecho,
            'cintura' => $request->cintura,
            'cadera' => $request->cadera,
            'brazo' => $request->brazo,
            'pierna' => $request->pierna,
            'observaciones' => $request->observaciones,
        ]);

        // Actualizar el peso actual del cliente
        $cliente->update([
            'peso_actual' => $request->peso,
        ]);

        return redirect()
            ->route('cliente.seguimiento.index')
            ->with(
                'success',
                'Tu progreso fue registrado correctamente.'
            );
    }
}