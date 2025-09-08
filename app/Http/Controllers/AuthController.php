<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AuthController extends Controller
{
    public function mostrarFormularioRegistro(){
        return view('registro');
    }

    public function registrarUsuario(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'empresacliente' => 'nullable|string|max:255',
            'correo' => 'required|email|unique:usuarios',
            'celular' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'codigopostal' => 'required|string|max:255',
            'cedula' => 'required|string|unique:usuarios',
            'contraseña' => 'required|min:6',
        ]);

        Usuario::Create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'empresacliente' => $request->empresacliente,
            'correo' => $request->correo,
            'celular' => $request->celular,
            'direccion' => $request->direccion,
            'codigopostal' => $request->codigopostal,
            'cedula' => $request->cedula,
            'contraseña' => bcrypt($request->contraseña), //bcryp para encriptar la contraseña
        ]);

        return redirect()->route('registro.form')->with('success','Usuarios registrado');
    }

    public function mostrarFormularioLogin(){
        return view(('login'));
    }

    public function iniciarSesion (Request $request){

        $request->validate([
           'correo' => 'required|email' ,
           'contraseña' => 'required|string',
        ]);

        $usuario = Usuario::where('correo', $request->correo)->first();

        if($usuario && Hash::check($request->contraseña, $usuario->contraseña)){
            session(['usuario_id' => $usuario->id]);
            return redirect()->route('dashboard')->with('success', 'Bienvenido, '. $usuario->nombre);
        }

        return back()->withErrors(['correo' => 'Credenciales incorrectas']);

    }

    public function mostrarDashboard(){
        if(!session()->has('usuario_id')){
            return redirect()->route('login.form')->withErrors(['access' => 'Debes inciar sesión']);
        }
        $usuario = Usuario::find(session('usuario_id'));
        return view('dashboard', compact('usuario'));
    }
}

