<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ejercicio;

class EjercicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $ejercicios = Ejercicio::orderBy('id')->get();

    return view('ejercicios.index', compact('ejercicios'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('ejercicios.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'grupo_muscular' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
    ]);

    Ejercicio::create([
        'nombre' => $request->nombre,
        'grupo_muscular' => $request->grupo_muscular,
        'descripcion' => $request->descripcion,
    ]);

    return redirect()
        ->route('ejercicios.index')
        ->with('success', 'Ejercicio registrado correctamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ejercicio $ejercicio)
{
    return view('ejercicios.edit', compact('ejercicio'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ejercicio $ejercicio)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'grupo_muscular' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
    ]);

    $ejercicio->update([
        'nombre' => $request->nombre,
        'grupo_muscular' => $request->grupo_muscular,
        'descripcion' => $request->descripcion,
    ]);

    return redirect()
        ->route('ejercicios.index')
        ->with('success', 'Ejercicio actualizado correctamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ejercicio $ejercicio)
{
    $ejercicio->delete();

    return redirect()
        ->route('ejercicios.index')
        ->with('success', 'Ejercicio eliminado correctamente.');
}
}
