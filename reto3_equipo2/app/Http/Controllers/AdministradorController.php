<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdministradorController extends Controller
{
    public function showLogin(){
        return view('login');
    }
    public function login(Request $request){
        $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        $administrador = Administrador::where('usuario', $request->usuario)->first();

        if (!$administrador || !Hash::check($request->password, $administrador->password)) {
            // TODO : Quitar si funciona el mensaje lateral entrante.
            return back()->withErrors(['message' => 'Usuario o contraseña incorrectos.']);
        }

        session([
            'admin_id' => $administrador->id,
        ]);

        return redirect()->route('centros.listCentros')->with('success', 'Inicio de sesión exitoso');
    }

    public function showCrearAdmin(){
        return view('Administrador/createAdministrador');
    }

    public function crearAdministrador(Request $request){
        $request->validate([
            'usuario' => 'required|string|unique:administradores,usuario',
            'password' => 'required|string',
        ]);

        $administrador = new Administrador();
        $administrador->nombre = "nombreEjemplo";
        $administrador->apellidos = "apellidosEjemplo";
        $administrador->dni = "12345678Z";
        $administrador->direccion = "direccionEjemplo";
        $administrador->codigo_postal = "00100";
        $administrador->usuario = $request->usuario;
        $administrador->password = Hash::make($request->password); // Hashear la contraseña
        $administrador->save();

        return redirect()->route('administrador.showLogin')->with('success', 'Administrador creado exitosamente.');
    }
}
