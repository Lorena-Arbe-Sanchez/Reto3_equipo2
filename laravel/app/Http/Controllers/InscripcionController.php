<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\CentroCivico;
use App\Models\Ciudadano;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
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

            if ($validator->fails()) {
                return redirect()
                    ->route('actividad.showActividades')
                    ->withErrors($validator)
                    ->withInput();
            }

            // Obtener los datos
            $dni = $request->input('casillaDni');
            $actividadId = $request->input('id_actividad');

            // Verificar si existe un ciudadano con ese DNI
            $existingCiudadano = Ciudadano::where('dni', $dni)->first();

            if (!$existingCiudadano) {
                return redirect()
                    ->route('actividad.showActividades')
                    ->withErrors(['No se pudo encontrar el DNI en los registros.'])
                    ->withInput();
            }

            // Obtener el ID del ciudadano asociado a ese DNI
            $ciudadanoId = $existingCiudadano->id;

            // Verificar si ya existe una inscripción para ese ciudadano y actividad
            $existingInscription = Inscripcion::where('id_actividad', $actividadId)
                ->where('id_ciudadano', $ciudadanoId)
                ->first();

            if ($existingInscription) {
                return redirect()
                    ->route('actividad.showActividades')
                    ->withErrors(['Ya estás inscrito en esta actividad.'])
                    ->withInput();
            }

            // Crear la inscripción
            $inscripcion = new Inscripcion();
            $inscripcion->id_actividad = $actividadId;
            $inscripcion->id_ciudadano = $ciudadanoId;
            $inscripcion->save();

            // Después de crear la inscripción habría que actualizar el valor de la columna 'plazas_disponibles' de la actividad a 'plazas_disponibles - 1'.

            // Obtener la actividad
            $actividad = Actividad::findOrFail($actividadId);

            if (!$actividad) {
                // Si la actividad no existe, eliminar la inscripción y redirigir con un error
                $inscripcion->delete();
                return redirect()
                    ->route('actividad.showActividades')
                    ->withErrors(['Actividad no encontrada.']);
            }

            // Decrementar el número de plazas disponibles
            $actividad->plazas_disponibles--;
            $actividad->save();
            return redirect()
                ->route('actividad.showActividades')
                ->with('success', 'Inscripción realizada correctamente.');

        }
        catch (\Exception $e) {
            // Manejar cualquier excepción que ocurra
            return redirect()
                ->route('actividad.showActividades')
                ->withErrors(['Ocurrió un error al realizar la inscripción: ' . $e->getMessage()])
                ->withInput();
        }

    }

    public function show(Request $request){
        $query = Inscripcion::with('actividad', 'ciudadano');

        if ($request->filled('centro_civico')) {
            $query->whereHas('actividad.centroCivico', function ($q) use ($request) {
                $q->where('id', $request->centro_civico);
            });
        }

        if ($request->filled('actividad')) {
            $query->where('id_actividad', $request->actividad);
        }

        $inscripciones = $query;

        // Contar el total de inscripciones encontradas
        $inscripcionesTotales = $inscripciones->count();

        $inscripciones = $query->paginate(10);

        $centroCivicos = CentroCivico::all();
        $actividades = Actividad::all();

        return view('Inscripcion.listInscripciones', compact('inscripciones', 'centroCivicos', 'actividades', 'inscripcionesTotales'));
    }

    public function destroy(Request $request){
        $request->validate([
            'id_actividad' => 'required|exists:inscripciones,id_actividad',
            'id_ciudadano' => 'required|exists:inscripciones,id_ciudadano'
        ]);

        Inscripcion::where('id_actividad', $request->id_actividad)
            ->where('id_ciudadano', $request->id_ciudadano)
            ->delete();

        // Actualizar el número de plazas disponibles de la actividad sumando 1
        Actividad::where('id', $request->id_actividad)
            ->increment('plazas_disponibles');

        return redirect()->back()->with('success', 'Inscripción eliminada correctamente.');
    }

    public function getTodasActividades() {
        $actividades = Actividad::all();
        return response()->json($actividades);
    }

    public function getActividadesPorCentro($id){
        $actividades = Actividad::where('centro_civico_id', $id)->get();
        return response()->json($actividades);
    }

}
