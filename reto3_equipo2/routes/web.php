<?php

use App\Http\Controllers\CentroCivicoController;
use App\Http\Controllers\ActividadController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CentroCivicoController::class, 'show'])->name('centros.listCentros');
/*
 * =======
//De momento usaremos estos para ir a las diferentes rutas hasta que estén los controladores programados
//Login admin
Route::get('/login', function () {
    return view('login');
});

//Lista de centros cívicos
Route::get('/', function () {
    return view('CentroCivico/listCentros');
})->name('centro.list');

//Listar actividades
Route::get('/actividades', function () {
    return view('Actividad/listActividades');
});

//Crear actividades
Route::get('/crearActividad', function () {
    return view('Actividad/createActividad');
});

//Editar actividades
Route::get('/editarActividad', function () {
    return view('Actividad/editActividad');
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
