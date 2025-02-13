<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\CentroCivico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActividadController extends Controller
{

    public function create(){
        return view('actividad.createActividad');
    }
    public function save(Request $request){


        try {

            // Validar campos requeridos
            $validator = Validator::make($request->all(), [
                'titulo' => 'required',
                'descripcion' => 'required',
                'fecha_inicio' => 'required',
                'fecha_fin' => 'required',
                'dia_1' => 'required',
                'dia_2' => 'required',
                'hora_inicio' => 'required',
                'hora_fin' => 'required',
                'idioma' => 'required',
                'plazas_totales' => 'required',
                'plazas_minimas' => 'required',
                'edad_minima' => 'required',
                'edad_maxima' => 'required',

            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
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

            $actividad->save();



        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()])->withInput();
        }

        return view('actividad.createActividad');

    }

    public function showActividades($id = null ){

        $actividades = "";

        if($id == null){
            $actividades = Actividad::all();
        }

        $centroCivicos = CentroCivico::all();

        return view('Actividad.listActividades', compact('actividades','centroCivicos'));

    }


    public function delete($id){
        Actividad::destroy($id);
    }

    public function edit($id){

        $datos = Actividad::findOrFail($id);

        return view('actividad.editActividad', compact('datos'));

    }


    public function update(Request $request){

        $validator = Validator::make($request->all(),[
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'dia_1' => 'required',
            'dia_2' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'idioma' => 'required',
            'plazas_totales' => 'required',
            'plazas_minimas' => 'required',
            'edad_minima' => 'required',
            'edad_maxima' => 'required',
        ]);


        if($validator->fails()){
            return response()->json($validator->errors(),400);
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

        $actividad->update();



    }


}
