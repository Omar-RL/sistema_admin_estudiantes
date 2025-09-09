<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;

// Mostrar lista de estudiantes en "/" y "/estudiantes"
Route::get('/', [EstudianteController::class, 'index'])->name('estudiantes.index');
Route::get('/estudiantes', [EstudianteController::class, 'index']);

// CRUD completo de estudiantes
Route::resource('estudiantes', EstudianteController::class);
