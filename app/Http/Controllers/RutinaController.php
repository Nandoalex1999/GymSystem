<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rutina;
use App\Models\Cliente;
use App\Models\Ejercicio;
use App\Models\RutinaEjercicio;

class RutinaController extends Controller
{
    /**
     * Mostrar todas las rutinas.
     */
    public function index()
    {
        $rutinas = Rutina::with('cliente')
            ->orderBy('id', 'desc')
            ->get();

        return view('rutinas.index', compact('rutinas'));
    }


    /**
     * Mostrar formulario para crear una rutina.
     */
    public function create()
    {
        $clientes = Cliente::where('estado', true)
            ->orderBy('nombres')
            ->get();

        return view('rutinas.create', compact('clientes'));
    }


    /**
     * Guardar una nueva rutina.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        Rutina::create([
            'cliente_id' => $request->cliente_id,
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
        $rutina->load([
            'cliente',
            'ejercicios.ejercicio'
        ]);

        return view('rutinas.show', compact('rutina'));
    }


    /**
     * Mostrar formulario para editar una rutina.
     */
    public function edit(Rutina $rutina)
    {
        $clientes = Cliente::where('estado', true)
            ->orderBy('nombres')
            ->get();

        return view(
            'rutinas.edit',
            compact('rutina', 'clientes')
        );
    }


    /**
     * Actualizar una rutina.
     */
    public function update(Request $request, Rutina $rutina)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $rutina->update([
            'cliente_id' => $request->cliente_id,
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
        $ejercicios = Ejercicio::orderBy('nombre')->get();

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
     * Mostrar formulario para editar un ejercicio de la rutina.
     */
    public function editarEjercicio(
        RutinaEjercicio $rutinaEjercicio
    ) {
        $rutinaEjercicio->load(
            'ejercicio',
            'rutina'
        );

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

        $existe = RutinaEjercicio::where(
            'rutina_id',
            $rutina->id
        )
            ->where(
                'ejercicio_id',
                $request->ejercicio_id
            )
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

        $ultimoOrden = RutinaEjercicio::where(
            'rutina_id',
            $rutina->id
        )->max('orden');

        $nuevoOrden = ($ultimoOrden ?? 0) + 1;

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

        $rutinaEjercicio->delete();

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
            ->route('rutinas.gestionar', $rutinaId)
            ->with(
                'success',
                'Ejercicio eliminado correctamente.'
            );
    }
}