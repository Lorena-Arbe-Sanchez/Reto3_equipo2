<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\CentroCivico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActividadController extends Controller
{

    public function create(){
        $centroCivicos = CentroCivico::all();
        return view('actividad.createActividad', compact('centroCivicos'));
    }
    public function save(Request $request){
        try {
            $centroCivicos = CentroCivico::all();

            // Validar campos requeridos
            $validator = Validator::make($request->all(), [
                'titulo' => 'required',
                'descripcion' => 'required',
                'fecha_inicio' => 'required',
                'fecha_fin' => 'required',
                'dia_1' => 'required',
                'dia_2',
                'hora_inicio' => 'required',
                'hora_fin' => 'required',
                'idioma' => 'required',
                'plazas_totales' => 'required',
                'plazas_minimas' => 'required',
                'edad_minima',
                'edad_maxima',
                'centro_civico_id' => 'required',
                'imagen' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $imagenPath = null;
            if ($request->hasFile('imagen')) {
                $imagenPath = $request->file('imagen')->store('actividades', 'public');
            }

            $actividad = new Actividad();
            $actividad->titulo = $request->input('titulo');
            $actividad->descripcion = $request->input('descripcion');
            $actividad->fecha_inicio = $request->input('fecha_inicio');
            $actividad->fecha_fin = $request->input('fecha_fin');
            $actividad->dia_1 = $request->input('dia_1');
            $actividad->dia_2 = $request->input('dia_2');
            $actividad->hora_inicio = $request->input('hora_inicio');
            $actividad->hora_fin = $request->input('hora_fin');
            $actividad->idioma = $request->input('idioma');
            $actividad->plazas_totales = $request->input('plazas_totales');
            $actividad->plazas_disponibles = $request->input('plazas_totales');
            $actividad->plazas_minimas = $request->input('plazas_minimas');
            $actividad->edad_minima = $request->input('edad_minima');
            $actividad->edad_maxima = $request->input('edad_maxima');
            $actividad->centro_civico_id = $request->input('centro_civico_id');
            $actividad->imagen = $imagenPath;

            $actividad->save();

        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()])->withInput();
        }

        return view('actividad.createActividad', compact('centroCivicos'));
    }

    public function showActividades($id = null ){

        $actividades = "";

        if($id == null){
            $actividades = Actividad::all();
        }

        $centroCivicos = CentroCivico::all();

        return view('Actividad.listActividades', compact('actividades','centroCivicos'));

    }

    public function showActividadesCentro($id){

        $actividades = Actividad::where('centro_civico_id', $id)->get();

        $centroCivicos = CentroCivico::all();

        return view('Actividad.listActividades', compact('actividades','centroCivicos'));

    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        Actividad::where('id', $request->id)
            ->delete();

        return redirect()->back()->with('success', 'Actividad eliminada correctamente.');
    }

    public function edit($id){
        $datos = Actividad::findOrFail($id);
        return view('actividad.editActividad', compact('datos'));
    }

    public function update(Request $request, $id){
        $actividad = Actividad::findOrFail($id);

        $actividad->plazas_totales = $request->input('plazas_totales');

        $actividad->plazas_disponibles = $request->input('plazas_totales');

        $actividad->titulo = $request->input('titulo');
        $actividad->descripcion = $request->input('descripcion');
        $actividad->idioma = $request->input('idioma');
        $actividad->fecha_inicio = $request->input('fecha_inicio');
        $actividad->fecha_fin = $request->input('fecha_fin');
        $actividad->hora_inicio = $request->input('hora_inicio');
        $actividad->hora_fin = $request->input('hora_fin');
        $actividad->plazas_minimas = $request->input('plazas_minimas');
        $actividad->edad_minima = $request->input('edad_minima');
        $actividad->edad_maxima = $request->input('edad_maxima');
        $actividad->dia_1 = $request->input('dia_1');
        $actividad->dia_2 = $request->input('dia_2');

        $actividad->save();

        return redirect()->route('actividad.showActividades')->with('success', 'Actividad actualizada correctamente');
    }

}
