<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CentroCivicoController;

Route::get('/', [CentroCivicoController::class, 'show'])->name('centros.listCentros');
