<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\ActividadCentro;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function showAllActividad(){
        return response()->json(Actividad::all());
    }

    public function showActividadbyCentroCivico($id){

        $actividad = ActividadCentro::where('id_centro',$id)->get();

    }


    public function delete($id){
        Actividad::destroy($id);
    }
}
