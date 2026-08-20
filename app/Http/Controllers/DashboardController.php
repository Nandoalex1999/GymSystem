<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();

        if ($usuario->role && $usuario->role->nombre === 'Administrador') {
            return view('dashboard.index');
        }

        return view('dashboard.index');
    }
}