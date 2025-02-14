<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Ciudadano;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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

    public function save(Request $request,$id){

        try {

            // Validar campos requeridos
            $validator = Validator::make($request->all(), [

                'nombre' => 'required',
                'apellidos' => 'required',
                'dni' => 'required',
                'direccion' => 'required',
                'codigo_postal' => 'required',
            ]);

            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput();
            }

            $buscar = Ciudadano::findOrFail("dni",$request->get('dni'));



            //Modificar el numero de plazas de la actividad
            $actividad = Actividad::findOrFail($id);

            if ($actividad->plazas_disponibles > 0) {

                if($buscar == null){
                    $ciudadano = new Ciudadano();

                    $ciudadano->nombre = $request->input('titulo');
                    $ciudadano->apellidos = $request->input('descripcion');
                    $ciudadano->dni = $request->input('fecha_inicio');
                    $ciudadano->direccion = $request->input('fecha_fin');
                    $ciudadano->codigo_postal = $request->input('fecha_fin');
                    $ciudadano->save();

                    $registro = new Inscripcion();
                    $registro->id_actividad = $id;
                    $registro->id_ciudadano = $request->input('id');
                    $registro->save();


                }else{

                    $registro = new Inscripcion();
                    $registro->id_actividad = $id;
                    $registro->id_ciudadano = $request->input('id');
                    $registro->save();

                }


                $actividad->plazas_disponibles = $actividad->plazas_disponibles - 1;
                $actividad->save();
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()])->withInput();
        }
    }
}
