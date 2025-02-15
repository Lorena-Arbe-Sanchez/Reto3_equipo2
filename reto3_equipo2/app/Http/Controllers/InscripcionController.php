<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Ciudadano;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class InscripcionController extends Controller
{

    public function store(Request $request){

        try {

            // Validar campos requeridos
            $validator = Validator::make($request->all(), [
                'dni' => 'required',
            ]);

            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput();
            }

            $buscar = Ciudadano::findOrFail("dni",$request->get('casillaDni'));

            $actividadId = $request->get('id_actividad');

            //Modificar el numero de plazas de la actividad
            $actividad = Actividad::findOrFail($actividadId);

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
                    $registro->id_actividad = $actividadId;
                    $registro->id_ciudadano = $request->input('id');
                    $registro->save();


                }else{

                    $registro = new Inscripcion();
                    $registro->id_actividad = $actividadId;
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



    /*
    public function store(Request $request){

        try {
            DB::beginTransaction();

            // Buscar o crear el ciudadano con el DNI proporcionado
            $ciudadano = Ciudadano::firstOrCreate(['dni' => $request->dni]);

            // Verificar si hay plazas disponibles
            $actividad = Actividad::findOrFail($request->actividad_id);

            if ($actividad->plazas_disponibles <= 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'No hay plazas disponibles'
                ], 400);
            }

            // Crear la inscripción
            Inscripcion::create([
                'id_actividad' => $request->actividad_id,
                'id_ciudadano' => $ciudadano->id
            ]);

            // Actualizar plazas disponibles
            $actividad->plazas_disponibles = $actividad->plazas_disponibles - 1;
            $actividad->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Inscripción realizada con éxito',
                'plazas_disponibles' => $actividad->plazas_disponibles
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error al realizar la inscripción'
            ], 500);
        }
    }
    */



    public function show(){
        $inscripciones = Inscripcion::with('actividad','ciudadano')->paginate(3);
        return view('Inscripcion.listInscripciones', compact('inscripciones'));
    }

    //public function destroy(Request $request)
    public function delete(Request $request){
        $request->validate([
            'id_actividad' => 'required|exists:inscripciones,id_actividad',
            'id_ciudadano' => 'required|exists:inscripciones,id_ciudadano'
        ]);

        Inscripcion::where('id_actividad', $request->id_actividad)
            ->where('id_ciudadano', $request->id_ciudadano)
            ->delete();

        // TODO : Y actualizar el valor a "plazas_disponibles + 1" de la actividad.

        return redirect()->back()->with('success', 'Inscripción eliminada correctamente.');
    }

}
