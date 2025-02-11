<?php

use App\Http\Controllers\CentroCivicoController;
use App\Http\Controllers\ActividadController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CentroCivicoController::class, 'show'])->name('centros.listCentros');

Route::controller(ActividadController::class)->group(function() {
    Route::get('/showActividades', 'showActividades')->name('actividad.showActividades');
});
