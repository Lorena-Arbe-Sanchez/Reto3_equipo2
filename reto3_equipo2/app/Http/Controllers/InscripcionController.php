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
                'casillaDni' => 'required|string|size:9',
                'id_actividad' => 'required|integer|exists:actividades,id',
            ]);

            // TODO : Después de crear la inscripción --> Actualizar el valor de la columna a 'plazas_disponibles - 1' en la actividad
            // https://chatgpt.com/c/67af836b-d15c-8003-badf-b11f8efcfc55
            // http://127.0.0.1:8000/

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Obtener los datos validados
            $dni = $request->input('casillaDni');
            $actividadId = $request->input('id_actividad');

            // Verificar si ya existe una inscripción para este DNI y actividad
            $existingInscription = Inscripcion::where('dni', $dni)
                ->where('id_actividad', $actividadId)
                ->first();

            if ($existingInscription) {
                return redirect()->back()
                    ->withErrors(['Ya estás inscrito en esta actividad.'])
                    ->withInput();
            }

            // Crear la inscripción
            $inscripcion = new Inscripcion();
            $inscripcion->dni = $dni;
            $inscripcion->id_actividad = $actividadId;
            $inscripcion->fecha_inscripcion = now(); // Opcional: guardar la fecha de inscripción
            $inscripcion->save();

            // TODO : Después de crear la inscripción --> Actualizar el valor de la columna a 'plazas_disponibles - 1' en la actividad
            // Obtener la actividad
            $actividad = Actividad::find($actividadId);

            if (!$actividad) {
                // Si la actividad no existe, podrías lanzar una excepción o redirigir con un error.
                // En este caso, eliminamos la inscripción creada para mantener la integridad de los datos.
                $inscripcion->delete();
                return redirect()->back()->withErrors(['Actividad no encontrada.']);
            }

            // Verificar si hay plazas disponibles
            if ($actividad->plazas_disponibles > 0) {
                // Decrementar el número de plazas disponibles
                $actividad->plazas_disponibles--;
                $actividad->save();
            } else {
                // Si no hay plazas disponibles, eliminar la inscripción y redirigir con un error
                $inscripcion->delete();
                return redirect()->back()->withErrors(['No hay plazas disponibles para esta actividad.']);
            }


            // Redirigir con un mensaje de éxito
            return redirect()->route('inscripcion.index') // Cambia 'inscripcion.index' a la ruta correcta
            ->with('success', 'Inscripción realizada con éxito.');

        } catch (\Exception $e) {
            // Manejar cualquier excepción que ocurra
            return redirect()->back()
                ->withErrors(['Ocurrió un error al realizar la inscripción: ' . $e->getMessage()])
                ->withInput();
        }

//            $buscar = Ciudadano::findOrFail("dni",$request->get('casillaDni'));
//
//            $actividadId = $request->get('id_actividad');
//
//            //Modificar el numero de plazas de la actividad
//            $actividad = Actividad::findOrFail($actividadId);
//
//            if ($actividad->plazas_disponibles > 0) {
//
//                if($buscar == null){
//                    $ciudadano = new Ciudadano();
//
//                    $ciudadano->nombre = $request->input('titulo');
//                    $ciudadano->apellidos = $request->input('descripcion');
//                    $ciudadano->dni = $request->input('fecha_inicio');
//                    $ciudadano->direccion = $request->input('fecha_fin');
//                    $ciudadano->codigo_postal = $request->input('fecha_fin');
//                    $ciudadano->save();
//
//                    $registro = new Inscripcion();
//                    $registro->id_actividad = $actividadId;
//                    $registro->id_ciudadano = $request->input('id');
//                    $registro->save();
//
//
//                }else{
//
//                    $registro = new Inscripcion();
//                    $registro->id_actividad = $actividadId;
//                    $registro->id_ciudadano = $request->input('id');
//                    $registro->save();
//
//                }
//
//                $actividad->plazas_disponibles = $actividad->plazas_disponibles - 1;
//                $actividad->save();
//            }
//        } catch (\Exception $exception) {
//            return redirect()->back()->withErrors(['error' => $exception->getMessage()])->withInput();
//        }
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
        $inscripciones = Inscripcion::with('actividad','ciudadano')->paginate(10);
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
