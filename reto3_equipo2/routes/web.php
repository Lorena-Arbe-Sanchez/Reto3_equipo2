<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\CentroCivicoController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\InscripcionController;
use Illuminate\Support\Facades\Route;

Route::controller(CentroCivicoController::class)->group(function () {
    Route::get('/', 'show')->name('centros.listCentros');
});

Route::get('/actividades/filtrar', [ActividadController::class, 'showActividadesFiltros'])->name('actividad.showActividadesFiltros');

Route::controller(ActividadController::class)->group(function() {
    // "url": Cómo aparece en la web, "action": Cómo se llama la función de ese controlador, "name": Cómo se llama a la ruta desde una ventana (.blade.php)
    Route::get('/showActividades', 'showActividades')->name('actividad.showActividades');
    Route::get('/showActividades/{id}', 'showActividadesCentro')->name('actividad.showActividadesCentro');

    // Todos los usuarios podrán acceder a los listados de actividades, pero solo los administradores (logueados con "auth") podrán realizar la gestión.
    Route::middleware('auth')->group(function () {
        Route::get('/createActividad', 'create')->name('actividad.create');
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

Route::controller(InscripcionController::class)->group(function() {
    Route::post('/inscripcion', 'store')->name('inscripcion.store');

    Route::middleware('auth')->group(function () {
        Route::get('/showInscripciones', 'show')->name('inscripcion.show');
        Route::delete('/deleteInscripcion', 'delete')->name('inscripcion.delete');
    });
});



// TODO : Poner bien los nombres de las rutas con esto
/*
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\CentroCivicoController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\InscripcionController;
use Illuminate\Support\Facades\Route;

Route::controller(CentroCivicoController::class)->group(function () {
    Route::get('/', 'show')->name('centros.listCentros');
});

Route::controller(ActividadController::class)->group(function () {
    Route::get('/actividad', 'index')->name('actividad.showActividades');
    Route::get('/actividad/{id}', 'show')->name('actividad.showActividadesCentro');

    Route::middleware('auth')->group(function () {
        Route::get('/actividad', 'create')->name('actividad.create');
        Route::post('/actividad', 'store')->name('actividad.store');
        Route::get('/actividad/{id}/edit', 'edit')->name('actividad.edit');
        Route::put('/actividad/{id}', 'update')->name('actividad.update');
        Route::delete('/actividad/{id}', 'destroy')->name('actividad.delete');
    });
});

Route::controller(AdministradorController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'login_admin')->name('administrador.login');
    Route::post('/logout', 'logout')->name('administrador.logout');
});

Route::controller(InscripcionController::class)->middleware('auth')->group(function () {
    // "url": Cómo aparece en la web, "action": Cómo se llama la función de ese controlador, "name": Cómo se llama a la ruta desde una ventana (.blade.php)
    Route::post('/inscripcion', 'store')->name('inscripcion.store');
    Route::get('/inscripcion', 'show')->name('inscripcion.show');
    Route::delete('/inscripcion/{id}', 'destroy')->name('inscripcion.delete');
});
*/
