<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Mostrar todos los clientes.
     */
    public function index()
    {
        $clientes = Cliente::orderBy('id', 'desc')->get();

        return view('clientes.index', compact('clientes'));
    }

    /**
     * Mostrar formulario para crear un cliente.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Guardar un nuevo cliente.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cedula' => 'required|unique:clientes,cedula|max:20',
            'nombres' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|in:Masculino,Femenino',
            'telefono' => 'required|max:20',
            'correo' => 'required|email|unique:clientes,correo',
            'direccion' => 'required|max:255',
            'altura' => 'required|numeric|min:0.5|max:2.5',
            'peso_actual' => 'required|numeric|min:1|max:500',
            'objetivo' => 'required|max:255',
        ]);

        Cliente::create([
            'cedula' => $request->cedula,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'sexo' => $request->sexo,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'direccion' => $request->direccion,
            'altura' => $request->altura,
            'peso_actual' => $request->peso_actual,
            'objetivo' => $request->objetivo,
            'estado' => true,
        ]);

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente registrado correctamente.');
    }

    /**
     * Mostrar formulario para editar un cliente.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Actualizar un cliente.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'cedula' => 'required|max:20|unique:clientes,cedula,' . $cliente->id,
            'nombres' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|in:Masculino,Femenino',
            'telefono' => 'required|max:20',
            'correo' => 'required|email|unique:clientes,correo,' . $cliente->id,
            'direccion' => 'required|max:255',
            'altura' => 'required|numeric|min:0.5|max:2.5',
            'peso_actual' => 'required|numeric|min:1|max:500',
            'objetivo' => 'required|max:255',
            'estado' => 'required|boolean',
        ]);

        $cliente->cedula = $request->cedula;
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->fecha_nacimiento = $request->fecha_nacimiento;
        $cliente->sexo = $request->sexo;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->direccion = $request->direccion;
        $cliente->altura = $request->altura;
        $cliente->peso_actual = $request->peso_actual;
        $cliente->objetivo = $request->objetivo;
        $cliente->estado = $request->estado;

        $cliente->save();

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente actualizado correctamente.');
    }

    /**
     * Eliminar un cliente.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente eliminado correctamente.');
    }
}