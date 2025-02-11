<?php

use App\Http\Controllers\CentroCivicoController;
use App\Http\Controllers\ActividadController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CentroCivicoController::class, 'show'])->name('centros.listCentros');
/*
 * =======
//De momento usaremos estos para ir a las diferentes rutas hasta que estén los controladores programados
//Lista de centros cívicos
Route::get('/', function () {
    return view('CentroCivico/listCentros');
});

//Lista de actividades
Route::get('/actividades', function () {
    return view('Actividad/listActividades');
});


//Cuando estén los controladores hechos usaremos los de abajo
/*
//Centros cívicos
Route::controller(CentroCivicoController::class)->group(function () {
    Route::get('/', 'list');
});
*/

/*
//Actividades
Route::controller(ActividadController::class)->group(function () {
    Route::get('/actividades', 'list');
});
*/
