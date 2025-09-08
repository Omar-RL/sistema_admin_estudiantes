<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí registramos todas las rutas web de la aplicación.
| Las rutas que requieren autenticación se agrupan con middleware 'auth'.
|
*/

// Ruta pública - página de inicio
Route::get('/', function () {
    return view('estudiantes.index');
});

// Rutas de autenticación (login, register, logout, etc.)
Auth::routes();

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    
    // Ruta al dashboard/home
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // Rutas para el CRUD de estudiantes
    Route::resource('estudiantes', EstudianteController::class);

});
