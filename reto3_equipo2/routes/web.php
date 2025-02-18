<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\CentroCivicoController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\CiudadanoController;
use App\Http\Controllers\InscripcionController;
use Illuminate\Support\Facades\Route;

// "url": Cómo aparece en la web, "action": Cómo se llama la función de ese controlador, "name": Cómo se llama a la ruta desde una ventana (.blade.php)

Route::controller(CentroCivicoController::class)->group(function () {
    Route::get('/', 'show')->name('centros.listCentros');
});

Route::controller(ActividadController::class)->group(function() {

    // Todos los usuarios podrán acceder a los listados de actividades, pero solo los administradores (logueados con "auth") podrán realizar la gestión.
    Route::middleware('auth')->group(function () {
        Route::get('/actividad/create', 'create')->name('actividad.create');
        Route::post('/actividad/store', 'store')->name('actividad.store');
        Route::get('/actividad/{id}/edit', 'edit')->name('actividad.edit');
        Route::put('/actividad/{id}/update', 'update')->name('actividad.update');
        Route::delete('/actividad/destroy', 'destroy')->name('actividad.destroy');
    });

    Route::get('/actividad', 'index')->name('actividad.showActividades');
    Route::get('/actividad/{id}', 'show')->name('actividad.showActividadesCentro');

});

Route::controller(AdministradorController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::post('/login/create', 'login_admin')->name('administrador.login');
    Route::post('/logout', 'logout')->name('administrador.logout');
});

Route::controller(InscripcionController::class)->group(function() {
    Route::post('/inscripcion', 'store')->name('inscripcion.store');

    Route::middleware('auth')->group(function () {
        Route::get('/inscripcion/show', 'show')->name('inscripcion.show');
        Route::delete('/inscripcion/destroy', 'destroy')->name('inscripcion.destroy');
    });
});

Route::controller(CiudadanoController::class)->group(function() {
    Route::middleware('auth')->group(function () {
        Route::get('/ciudadano/create', 'create')->name('ciudadano.create');
        Route::post('/ciudadano/store', 'store')->name('ciudadano.store');
        //Route::delete('/ciudadano/destroy', 'destroy')->name('ciudadano.destroy');
    });
});
