<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\ActividadCentro;
use App\Models\CentroCivico;
use Illuminate\Http\Request;

class ActividadController extends Controller
{

    public function showActividades($id = null ){

        $actividades = "";


        if($id == null){

            $actividades = Actividad::all();

        }else{

            $actividades = ActividadCentro::where('id_centro',$id)->get();


        }

        $centroCivicos = CentroCivico::all();


        return view('Actividad.listActividades', compact('actividades','centroCivicos'));

    }


    public function delete($id){
        Actividad::destroy($id);
    }
}
