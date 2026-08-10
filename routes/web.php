<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AlimentacionController;
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
*/

Route::resource('usuarios', UserController::class)
    ->middleware(['auth', 'verified']);


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
    ->middleware(['auth', 'verified']);


/*
|--------------------------------------------------------------------------
| Alimentación
|--------------------------------------------------------------------------
*/

Route::resource('alimentacion', AlimentacionController::class)
    ->middleware(['auth', 'verified']);


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
| Autenticación
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';