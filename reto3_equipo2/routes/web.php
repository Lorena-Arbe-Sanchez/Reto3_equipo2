<?php

use App\Http\Controllers\CentroCivicoController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\InscripcionController;
use Illuminate\Support\Facades\Route;

Route::controller(CentroCivicoController::class)->group(function () {
    Route::get('/', 'show');
});

Route::get('/listInscripciones', [InscripcionController::class, 'show']);
/*
Route::controller(InscripcionController::class)->group(function () {
    Route::get('/listInscripciones', 'index');
});
*/


//Login admin
Route::get('/login', function () {
    return view('login');
});

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

/*
//Listar inscripciones
Route::get('/listInscripciones', function () {
    return view('Inscripcion/listInscripciones');
});
*/
