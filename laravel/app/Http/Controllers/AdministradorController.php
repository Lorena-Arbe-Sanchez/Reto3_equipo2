<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministradorController extends Controller
{
    public function login(){
        return view('login');
    }

    public function login_admin(Request $request){
        $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['usuario' => $request->usuario, 'password' => $request->password])) {
            return redirect()->route('centros.listCentros')->with('success', 'Inicio de sesión exitoso');
        }

        return back()->withErrors(['message' => 'Usuario o contraseña incorrectos.']);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('centros.listCentros');
    }
}
