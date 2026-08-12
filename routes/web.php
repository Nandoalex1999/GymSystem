<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AlimentacionController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ClienteRutinaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Página principal
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Usuarios
|--------------------------------------------------------------------------
| Solo Administradores pueden gestionar usuarios.
|--------------------------------------------------------------------------
*/

Route::resource('usuarios', UserController::class)
    ->middleware(['auth', 'verified', 'role:Administrador']);

/*
|--------------------------------------------------------------------------
| Ejercicios
|--------------------------------------------------------------------------
*/

Route::resource('ejercicios', EjercicioController::class)
    ->middleware(['auth', 'verified']);

/*
|--------------------------------------------------------------------------
| Rutinas
|--------------------------------------------------------------------------
*/

Route::resource('rutinas', RutinaController::class)
    ->middleware(['auth', 'verified']);

/*
|--------------------------------------------------------------------------
| Clientes
|--------------------------------------------------------------------------
*/

Route::resource('clientes', ClienteController::class)
    ->middleware(['auth', 'verified', 'role:Administrador,Entrenador']);

/*
|--------------------------------------------------------------------------
| Alimentación
|--------------------------------------------------------------------------
*/

Route::resource('alimentacion', AlimentacionController::class)
    ->middleware(['auth', 'verified']);

/*
|--------------------------------------------------------------------------
| Reportes
|--------------------------------------------------------------------------
*/

Route::get('/reportes', [ReporteController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('reportes.index');

/*
|--------------------------------------------------------------------------
| RUTINAS - GESTIÓN DE EJERCICIOS
|--------------------------------------------------------------------------
*/

Route::get('/rutinas/{rutina}/gestionar', [RutinaController::class, 'gestionar'])
    ->middleware(['auth', 'verified'])
    ->name('rutinas.gestionar');

Route::post('/rutinas/{rutina}/agregar-ejercicio', [RutinaController::class, 'agregarEjercicio'])
    ->middleware(['auth', 'verified'])
    ->name('rutinas.agregarEjercicio');

Route::get('/rutinas/ejercicio/{rutinaEjercicio}/editar', [RutinaController::class, 'editarEjercicio'])
    ->middleware(['auth', 'verified'])
    ->name('rutinas.editarEjercicio');

Route::put('/rutinas/ejercicio/{rutinaEjercicio}', [RutinaController::class, 'actualizarEjercicio'])
    ->middleware(['auth', 'verified'])
    ->name('rutinas.actualizarEjercicio');

Route::delete('/rutinas/ejercicio/{rutinaEjercicio}', [RutinaController::class, 'eliminarEjercicio'])
    ->middleware(['auth', 'verified'])
    ->name('rutinas.eliminarEjercicio');

/*
|--------------------------------------------------------------------------
| MIS RUTINAS - ÁREA DEL CLIENTE
|--------------------------------------------------------------------------
*/

Route::get('/mis-rutinas', [ClienteRutinaController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('cliente.rutinas.index');

Route::get('/mis-rutinas/{id}', [ClienteRutinaController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('cliente.rutinas.show');

/*
|--------------------------------------------------------------------------
| Autenticación
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';