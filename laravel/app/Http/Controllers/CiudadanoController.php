<?php

namespace App\Http\Controllers;

use App\Models\Ciudadano;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CiudadanoController extends Controller
{
    public function create(){
        $ciudadanos = Ciudadano::all();
        return view('Ciudadano.createCiudadano', compact('ciudadanos'));
    }

    public function store(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'dni' => 'required|string|size:9|unique:ciudadanos,dni|regex:/^[0-9]{8}[A-Z]$/',
                'fecha_nacimiento' => 'required|date|before:today',
                'direccion' => 'required|string|max:255',
                'codigo_postal' => 'required|string|size:5|regex:/^[0-9]{5}$/',
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

        return view('Ciudadano.createCiudadano', compact('ciudadano'));

    }
}
