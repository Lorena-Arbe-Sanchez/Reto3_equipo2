<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;

class InscripcionController extends Controller
{
    public function show()
    {
        $inscripciones = Inscripcion::with('actividad')->paginate(3);
        return view('Inscripcion.listInscripciones', compact('inscripciones'));
    }
}
