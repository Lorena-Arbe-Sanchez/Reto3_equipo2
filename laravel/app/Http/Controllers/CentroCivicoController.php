<?php

namespace App\Http\Controllers;

use App\Models\CentroCivico;

class CentroCivicoController extends Controller
{
    public function show(){
        $centroCivicos = CentroCivico::all();
        return view('CentroCivico.listCentros', compact('centroCivicos'));
    }
}
