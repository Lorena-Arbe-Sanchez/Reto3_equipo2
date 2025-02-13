<?php

namespace App\Http\Controllers;

use App\Models\Ciudadano;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CiudadanoController extends Controller
{
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


            $buscar = Ciudadano::where('dni', $request->input('dni'))->first();

            if(!$buscar){

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
                $registro->id_ciudadano = $buscar->id;

                $registro->save();

            }




        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()])->withInput();
        }

    }
}
