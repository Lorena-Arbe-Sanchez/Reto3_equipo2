<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

        if (Auth::attempt(['usuario' => $request->usuario, 'password' => $request->password])) {
            return redirect()->route('centros.listCentros')->with('success', 'Inicio de sesión exitoso');
        }

        return back()->withErrors(['message' => 'Usuario o contraseña incorrectos.']);

        /*
        $administrador = Administrador::where('usuario', $request->usuario)->first();

        if (!$administrador || !Hash::check($request->password, $administrador->password)) {
            // TODO : Quitar si funciona el mensaje lateral entrante.
            return back()->withErrors(['message' => 'Usuario o contraseña incorrectos.']);
        }

        session([
            'admin_id' => $administrador->id,
        ]);

        return redirect()->route('centros.listCentros')->with('success', 'Inicio de sesión exitoso');
        */
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('centros.listCentros');
    }
}
