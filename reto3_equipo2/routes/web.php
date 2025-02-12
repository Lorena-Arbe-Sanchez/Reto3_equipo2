<?php

use App\Http\Controllers\CentroCivicoController;
use App\Http\Controllers\ActividadController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CentroCivicoController::class, 'show'])->name('centros.listCentros');

//Login admin
Route::get('/login', function () {
    return view('login');
});


Route::controller(ActividadController::class)->group(function() {
    Route::get('/showActividades', 'showActividades')->name('actividad.showActividades');
    Route::get('/create', 'create')->name('actividad.create');
    Route::post('/save', 'save')->name('actividad.save');
    Route::get('/edit', 'create')->name('actividad.edit');
    Route::delete("/delete/actividad/{id}", 'delete')->name('actividad.delete');
});




//Crear actividades
Route::get('/crearActividad', function () {
    return view('Actividad/createActividad');
});

//Editar actividades
Route::get('/editarActividad', function () {
    return view('Actividad/editActividad');
});

//Listar inscripciones
Route::get('/listInscripciones', function () {
    return view('Inscripcion/listInscripciones');
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
