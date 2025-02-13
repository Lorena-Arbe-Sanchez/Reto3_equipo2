<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use Illuminate\Http\Request;


class InscripcionController extends Controller
{
    public function show()
    {
        $inscripciones = Inscripcion::with('actividad','ciudadano')->paginate(3);
        return view('Inscripcion.listInscripciones', compact('inscripciones'));
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id_actividad' => 'required|exists:inscripciones,id_actividad',
            'id_ciudadano' => 'required|exists:inscripciones,id_ciudadano'
        ]);

        Inscripcion::where('id_actividad', $request->id_actividad)
            ->where('id_ciudadano', $request->id_ciudadano)
            ->delete();

        return redirect()->back()->with('success', 'Inscripción eliminada correctamente.');
    }
}
