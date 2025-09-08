<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    
    protected $table = 'usuarios';

    // proteccion contra vulnerabiliades o ataques.
    // $fillable permite la asigancion masiva
    protected $fillable = [
    'nombre', 'apellido', 'empresacliente', 'correo',
    'celular', 'direccion', 'codigopostal', 'contraseña', 'cedula'
];
}

