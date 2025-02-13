<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\CentroCivicoController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\InscripcionController;
use Illuminate\Support\Facades\Route;

Route::controller(CentroCivicoController::class)->group(function () {
    Route::get('/', 'show')->name('centros.listCentros');
});

Route::controller(ActividadController::class)->group(function() {
    Route::get('/showActividades', 'showActividades')->name('actividad.showActividades');

    Route::middleware('auth')->group(function () {
        Route::get('/create', 'create')->name('actividad.create');
        Route::post('/save', 'save')->name('actividad.save');
        Route::get('/editActividad/{id}', 'edit')->name('actividad.edit');
        Route::put('/updateActividad/{id}', 'update')->name('actividad.update');
        Route::delete('/deleteActividad', 'delete')->name('actividad.delete');
    });
});

Route::controller(AdministradorController::class)->group(function() {
    Route::get('/showLogin', 'showLogin')->name('login');
    Route::post('/login', 'login')->name('administrador.login');
    Route::post('/logout', 'logout')->name('administrador.logout');
});

Route::controller(InscripcionController::class)->middleware('auth')->group(function() {
    Route::get('/showInscripciones', 'show')->name('inscripcion.show');
    Route::delete('/deleteInscripcion', 'delete')->name('inscripcion.delete');
});
