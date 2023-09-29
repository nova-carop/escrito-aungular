<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function (){

    Route::get('VerTareaPorId/{id}', [TareaController::class, 'VerTareaPorId']);
    Route::delete('eliminarTarea/{id}', [TareaController::class, 'eliminarTarea']);
    Route::get('VerTareaPorTitulo/{titulo}', [TareaController::class, 'VerTareaPorTitulo']);
    Route::get('VerTareaPorEstado/{estado}', [TareaController::class, 'VerTareaPorEstado']);
    Route::get('VerTareaPorAutor/{autor}', [TareaController::class, 'VerTareaPorAutor']);
    Route::post('/ValidarSiExisteLaTarea',[TareaController::class,'ValidarSiExisteLaTarea']);
});
