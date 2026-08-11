<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rutina;
use App\Models\Ejercicio;
use App\Models\RutinaEjercicio;

class RutinaController extends Controller
{
    /**
     * Mostrar todas las rutinas.
     */
    public function index()
    {
        $rutinas = Rutina::orderBy('id', 'desc')->get();

        return view('rutinas.index', compact('rutinas'));
    }

    /**
     * Mostrar formulario para crear una rutina.
     */
    public function create()
    {
        return view('rutinas.create');
    }

    /**
     * Guardar una nueva rutina.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        Rutina::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()
            ->route('rutinas.index')
            ->with('success', 'Rutina creada correctamente.');
    }

    /**
     * Mostrar una rutina.
     */
    public function show(Rutina $rutina)
    {
        return view('rutinas.show', compact('rutina'));
    }

    /**
     * Mostrar formulario para editar una rutina.
     */
    public function edit(Rutina $rutina)
    {
        return view('rutinas.edit', compact('rutina'));
    }

    /**
     * Actualizar una rutina.
     */
    public function update(Request $request, Rutina $rutina)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $rutina->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()
            ->route('rutinas.index')
            ->with('success', 'Rutina actualizada correctamente.');
    }

    /**
     * Eliminar una rutina.
     */
    public function destroy(Rutina $rutina)
    {
        $rutina->delete();

        return redirect()
            ->route('rutinas.index')
            ->with('success', 'Rutina eliminada correctamente.');
    }

    /**
     * Gestionar ejercicios de una rutina.
     */
    public function gestionar(Rutina $rutina)
    {
        // Todos los ejercicios disponibles para agregar.
        $ejercicios = Ejercicio::orderBy('nombre')->get();

        // Ejercicios que ya pertenecen a la rutina.
        $rutinaEjercicios = RutinaEjercicio::with('ejercicio')
            ->where('rutina_id', $rutina->id)
            ->orderBy('orden')
            ->get();

        return view(
            'rutinas.gestionar',
            compact(
                'rutina',
                'ejercicios',
                'rutinaEjercicios'
            )
        );
    }

    /**
     * Mostrar formulario para editar
     * un ejercicio de la rutina.
     */
    public function editarEjercicio(RutinaEjercicio $rutinaEjercicio)
    {
        $rutinaEjercicio->load('ejercicio', 'rutina');

        return view(
            'rutinas.editar-ejercicio',
            compact('rutinaEjercicio')
        );
    }

    /**
     * Agregar un ejercicio a una rutina.
     */
    public function agregarEjercicio(
        Request $request,
        Rutina $rutina
    ) {
        $request->validate([
            'ejercicio_id' => 'required|exists:ejercicios,id',
            'series' => 'required|integer|min:1',
            'repeticiones' => 'required|integer|min:1',
            'descanso' => 'required|integer|min:0',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Verificar si el ejercicio ya existe
        |--------------------------------------------------------------------------
        */

        $existe = RutinaEjercicio::where('rutina_id', $rutina->id)
            ->where('ejercicio_id', $request->ejercicio_id)
            ->exists();

        if ($existe) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Este ejercicio ya está agregado a la rutina.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Obtener el siguiente número de orden
        |--------------------------------------------------------------------------
        */

        $ultimoOrden = RutinaEjercicio::where(
            'rutina_id',
            $rutina->id
        )->max('orden');

        $nuevoOrden = ($ultimoOrden ?? 0) + 1;

        /*
        |--------------------------------------------------------------------------
        | Crear relación rutina - ejercicio
        |--------------------------------------------------------------------------
        */

        RutinaEjercicio::create([
            'rutina_id' => $rutina->id,
            'ejercicio_id' => $request->ejercicio_id,
            'series' => $request->series,
            'repeticiones' => $request->repeticiones,
            'descanso' => $request->descanso,
            'orden' => $nuevoOrden,
        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Ejercicio agregado correctamente.'
            );
    }

    /**
     * Actualizar un ejercicio de la rutina.
     */
    public function actualizarEjercicio(
        Request $request,
        RutinaEjercicio $rutinaEjercicio
    ) {
        $request->validate([
            'series' => 'required|integer|min:1',
            'repeticiones' => 'required|integer|min:1',
            'descanso' => 'required|integer|min:0',
        ]);

        $rutinaEjercicio->update([
            'series' => $request->series,
            'repeticiones' => $request->repeticiones,
            'descanso' => $request->descanso,
        ]);

        return redirect()
            ->route(
                'rutinas.gestionar',
                $rutinaEjercicio->rutina_id
            )
            ->with(
                'success',
                'Ejercicio actualizado correctamente.'
            );
    }

    /**
     * Eliminar un ejercicio de la rutina.
     */
    public function eliminarEjercicio(
        RutinaEjercicio $rutinaEjercicio
    ) {
        $rutinaId = $rutinaEjercicio->rutina_id;

        // Eliminar el ejercicio.
        $rutinaEjercicio->delete();

        /*
        |--------------------------------------------------------------------------
        | Reorganizar el orden
        |--------------------------------------------------------------------------
        */

        $ejerciciosRestantes = RutinaEjercicio::where(
            'rutina_id',
            $rutinaId
        )
            ->orderBy('orden')
            ->get();

        $orden = 1;

        foreach ($ejerciciosRestantes as $item) {
            $item->update([
                'orden' => $orden,
            ]);

            $orden++;
        }

        return redirect()
            ->back()
            ->with(
                'success',
                'Ejercicio eliminado correctamente.'
            );
    }
}