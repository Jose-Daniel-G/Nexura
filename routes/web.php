<?php

use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dash', function () {
    return view('dashboard.index');
});
// Route::get('/', [EmpleadoController::class, 'index'])->name('home'); // Ruta para la vista principal

Route::resource('empleados', EmpleadoController::class);
Route::delete('empleados/{empleado}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');
