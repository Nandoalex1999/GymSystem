<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rutina;
use App\Models\Ejercicio;
use App\Models\RutinaEjercicio;

class RutinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rutinas = Rutina::orderBy('id')->get();

        return view('rutinas.index', compact('rutinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rutinas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable',
        ]);

        Rutina::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('rutinas.index');
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
    public function edit(Rutina $rutina)
    {
        return view('rutinas.edit', compact('rutina'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rutina $rutina)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable',
        ]);

        $rutina->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('rutinas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rutina $rutina)
    {
        $rutina->delete();

        return redirect()->route('rutinas.index');
    }

    /**
     * Gestionar ejercicios de la rutina.
     */
    public function gestionar(Rutina $rutina)
    {
        $ejercicios = Ejercicio::orderBy('nombre')->get();

        $rutinaEjercicios = RutinaEjercicio::with('ejercicio')
            ->where('rutina_id', $rutina->id)
            ->orderBy('orden')
            ->get();

        return view('rutinas.gestionar', compact(
            'rutina',
            'ejercicios',
            'rutinaEjercicios'
        ));
    }

    /**
     * Mostrar formulario para editar un ejercicio de la rutina.
     */
    public function editarEjercicio(RutinaEjercicio $rutinaEjercicio)
    {
        return view('rutinas.editar-ejercicio', compact('rutinaEjercicio'));
    }

    /**
     * Agregar ejercicio a la rutina.
     */
    public function agregarEjercicio(Request $request, Rutina $rutina)
    {
        $request->validate([
            'ejercicio_id' => 'required',
            'series' => 'required|integer|min:1',
            'repeticiones' => 'required|integer|min:1',
            'descanso' => 'required|integer|min:0',
        ]);

        RutinaEjercicio::create([
            'rutina_id' => $rutina->id,
            'ejercicio_id' => $request->ejercicio_id,
            'series' => $request->series,
            'repeticiones' => $request->repeticiones,
            'descanso' => $request->descanso,
            'orden' => 1,
        ]);

        return redirect()->back()->with('success', 'Ejercicio agregado correctamente.');
    }

    /**
     * Actualizar ejercicio de la rutina.
     */
    public function actualizarEjercicio(Request $request, RutinaEjercicio $rutinaEjercicio)
{
    $request->validate([
        'series' => 'required|integer|min:1',
        'repeticiones' => 'required|integer|min:1',
        'descanso' => 'required|integer|min:0',
    ]);

    $rutinaEjercicio->series = $request->series;
    $rutinaEjercicio->repeticiones = $request->repeticiones;
    $rutinaEjercicio->descanso = $request->descanso;

    $rutinaEjercicio->save();

    return redirect()
        ->route('rutinas.gestionar', $rutinaEjercicio->rutina_id)
        ->with('success', 'Ejercicio actualizado correctamente.');
}

    /**
     * Eliminar ejercicio de la rutina.
     */
    public function eliminarEjercicio(RutinaEjercicio $rutinaEjercicio)
    {
        $rutinaEjercicio->delete();

        return redirect()->back()->with('success', 'Ejercicio eliminado correctamente.');
    }
}