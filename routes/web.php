<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TareaController;


Route::get('/', function () {
    return to_route('cliente.index');
});

Auth::routes();


Route::middleware(['auth'])->group(function()
{
    Route::resource('cliente', ClienteController::class);
    Route::resource('proyecto', ProyectoController::class);
    Route::resource('tarea', TareaController::class);
});
