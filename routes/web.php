<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioSolicitadoController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Rutas Web del Proyecto Mano a Mano
|--------------------------------------------------------------------------
*/

// Ruta principal (Portada)
Route::get('/', function () {
    return view('welcome');
});

// Panel de control (Dashboard)
Route::get('/dashboard', function () {
    return redirect()->route('servicios.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    // Rutas de perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas de solicitudes de servicios
    Route::resource('servicios', ServicioSolicitadoController::class);
});

// Rutas de autenticación (Login, Registro, etc.)
require __DIR__.'/auth.php';