<?php

namespace App\Http\Controllers;

use App\Models\Alimentacion;
use App\Models\Cliente;
use Illuminate\Http\Request;

class AlimentacionController extends Controller
{
    /**
     * Mostrar todos los planes alimenticios.
     */
    public function index()
    {
        $alimentaciones = Alimentacion::with('cliente')
            ->orderBy('id', 'desc')
            ->get();

        return view('alimentacion.index', compact('alimentaciones'));
    }

    /**
     * Mostrar formulario para crear un plan.
     */
    public function create()
    {
        $clientes = Cliente::where('estado', true)
            ->orderBy('nombres')
            ->get();

        return view('alimentacion.create', compact('clientes'));
    }

    /**
     * Guardar un nuevo plan alimenticio.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'nombre_plan' => 'required|string|max:255',
            'objetivo' => 'required|string|max:255',
            'calorias' => 'nullable|integer|min:1',
            'desayuno' => 'nullable|string',
            'almuerzo' => 'nullable|string',
            'merienda' => 'nullable|string',
            'cena' => 'nullable|string',
            'observaciones' => 'nullable|string',
        ]);

        Alimentacion::create([
            'cliente_id' => $request->cliente_id,
            'nombre_plan' => $request->nombre_plan,
            'objetivo' => $request->objetivo,
            'calorias' => $request->calorias,
            'desayuno' => $request->desayuno,
            'almuerzo' => $request->almuerzo,
            'merienda' => $request->merienda,
            'cena' => $request->cena,
            'observaciones' => $request->observaciones,
            'estado' => true,
        ]);

        return redirect()
            ->route('alimentacion.index')
            ->with('success', 'Plan alimenticio registrado correctamente.');
    }

    /**
     * Mostrar un plan alimenticio.
     */
    public function show(Alimentacion $alimentacion)
    {
        $alimentacion->load('cliente');

        return view('alimentacion.show', compact('alimentacion'));
    }

    /**
     * Mostrar formulario para editar un plan.
     */
    public function edit(Alimentacion $alimentacion)
    {
        $clientes = Cliente::orderBy('nombres')->get();

        return view('alimentacion.edit', compact(
            'alimentacion',
            'clientes'
        ));
    }

    /**
     * Actualizar un plan alimenticio.
     */
    public function update(Request $request, Alimentacion $alimentacion)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'nombre_plan' => 'required|string|max:255',
            'objetivo' => 'required|string|max:255',
            'calorias' => 'nullable|integer|min:1',
            'desayuno' => 'nullable|string',
            'almuerzo' => 'nullable|string',
            'merienda' => 'nullable|string',
            'cena' => 'nullable|string',
            'observaciones' => 'nullable|string',
            'estado' => 'required|boolean',
        ]);

        $alimentacion->update([
            'cliente_id' => $request->cliente_id,
            'nombre_plan' => $request->nombre_plan,
            'objetivo' => $request->objetivo,
            'calorias' => $request->calorias,
            'desayuno' => $request->desayuno,
            'almuerzo' => $request->almuerzo,
            'merienda' => $request->merienda,
            'cena' => $request->cena,
            'observaciones' => $request->observaciones,
            'estado' => $request->estado,
        ]);

        return redirect()
            ->route('alimentacion.index')
            ->with('success', 'Plan alimenticio actualizado correctamente.');
    }

    /**
     * Eliminar un plan alimenticio.
     */
    public function destroy(Alimentacion $alimentacion)
    {
        $alimentacion->delete();

        return redirect()
            ->route('alimentacion.index')
            ->with('success', 'Plan alimenticio eliminado correctamente.');
    }
}