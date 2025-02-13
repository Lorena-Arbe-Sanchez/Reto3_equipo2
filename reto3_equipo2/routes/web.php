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
    Route::get('/create', 'create')->name('actividad.create');
    Route::post('/save', 'save')->name('actividad.save');
    Route::get('/edit', 'create')->name('actividad.edit');
});

Route::controller(AdministradorController::class)->group(function() {
    Route::get('/showCrearAdmin', 'showCrearAdmin')->name('administrador.showCrearAdmin');
    Route::post('/crearAdministrador', 'crearAdministrador')->name('administrador.crearAdministrador');
    Route::get('/showLogin', 'showLogin')->name('administrador.showLogin');
    Route::post('/login', 'login')->name('administrador.login');
    Route::post('/logout', 'logout')->name('administrador.logout');
});

Route::controller(InscripcionController::class)->group(function() {
    Route::get('/showInscripciones', 'show')->name('inscripcion.show');
    Route::delete('/deleteInscripcion', 'delete')->name('inscripcion.delete');
});
