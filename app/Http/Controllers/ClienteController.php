<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
{
    $clientes = Cliente::orderBy('id', 'desc')->get();

    return view('clientes.index', compact('clientes'));
}

    public function create()
{
    return view('clientes.create');
}

    public function store(Request $request)
{
    $request->validate([
        'cedula' => 'required|unique:clientes,cedula|max:20',
        'nombres' => 'required|max:255',
        'apellidos' => 'required|max:255',
        'fecha_nacimiento' => 'required|date',
        'sexo' => 'required',
        'telefono' => 'required|max:20',
        'correo' => 'required|email|unique:clientes,correo',
        'direccion' => 'required|max:255',
        'altura' => 'required|numeric',
        'peso_actual' => 'required|numeric',
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

    public function edit(Cliente $cliente)
    {
        //
    }

    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    public function destroy(Cliente $cliente)
    {
        //
    }
}