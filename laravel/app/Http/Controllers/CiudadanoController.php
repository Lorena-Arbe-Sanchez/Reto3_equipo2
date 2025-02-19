<?php

namespace App\Http\Controllers;

use App\Models\Ciudadano;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CiudadanoController extends Controller
{
    public function create(){
        $ciudadanos = Ciudadano::all();
        return view('ciudadano.createCiudadano', compact('ciudadanos'));
    }

    public function store(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string',
                'apellidos' => 'required|string',
                'dni' => 'required|string',
                'direccion' => 'required|string',
                'codigo_postal' => 'required|string',
                'juego_barcos' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $ciudadano = new Ciudadano();

            $ciudadano->nombre = $request->nombre;
            $ciudadano->apellidos = $request->apellidos;
            $ciudadano->dni = $request->dni;
            $ciudadano->direccion = $request->direccion;
            $ciudadano->codigo_postal = $request->codigo_postal;
            $ciudadano->juego_barcos = $request->juego_barcos;

            $ciudadano->save();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()])->withInput();
        }

        return view('ciudadano.createCiudadano', compact('ciudadano'));

    }
}
