<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AuthApiController extends Controller
{
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if (! $usuario || ! Hash::check($request->password, $usuario->password)) {
            return response()->json(['error' => 'Credenciales invalidas'], 401);
        }

        $token = $usuario->createToken('token-login')->plainTextToken;

        return response()->json([
            'usuario' => [
                'id' => $usuario->id,
                'nombre' => $usuario->nombre,
                'email' => $usuario->email,
                'rol' => $usuario->rol,
            ],
            'token' => $token
        ]);
    }

    public function registro(Request $request)
    {
        $request->validate([
            'nombre'         => 'required|string|max:255',
            'apellido'       => 'required|string|max:255',
            'empresacliente' => 'nullable|string|max:255',
            'email'          => 'required|string|email|max:255|unique:usuarios',
            'celular'        => 'required|string|max:20',
            'direccion'      => 'required|string|max:255',
            'codigopostal'   => 'required|string|max:10',
            'password'       => 'required|string|min:6',
            'cedula'         => 'required|string|max:20|unique:usuarios',
        ]);

        $usuario = Usuario::create([
            'nombre'         => $request->nombre,
            'apellido'       => $request->apellido,
            'empresacliente' => $request->empresacliente,
            'email'          => $request->email,
            'celular'        => $request->celular,
            'direccion'      => $request->direccion,
            'codigopostal'   => $request->codigopostal,
            'password'       => Hash::make($request->password),
            'cedula'         => $request->cedula,
        ]);

        $token = $usuario->createToken('auth_token')->plainTextToken;

        return response()->json([
            'usuario' => [
                'id'     => $usuario->id,
                'nombre' => $usuario->nombre,
                'email'  => $usuario->email,
                'rol'    => $usuario->rol,
            ],
            'token' => $token
        ], 201);
    }

    public function perfil(Request $request)
    {
        return response()->json(($request->user()));
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['mensaje' => 'Sesión cerrada']);
    }
}
