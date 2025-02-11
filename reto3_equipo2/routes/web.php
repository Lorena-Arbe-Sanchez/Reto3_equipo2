<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CentroCivicoController;

Route::get('/', function () {
    return view('CentroCivico/listCentros');
});
