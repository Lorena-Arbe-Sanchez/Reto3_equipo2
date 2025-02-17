<?php

namespace App\Http\Controllers;

use App\Models\Ciudadano;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CiudadanoController extends Controller
{
    public function create(){
        $ciudadanos = Ciudadano::all();
        return view('ciudadano.createCiudadano', compact('ciudadanos'));
    }
}
