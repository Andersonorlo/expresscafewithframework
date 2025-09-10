<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    
    protected $table = 'usuarios';

    // proteccion contra vulnerabiliades o ataques.
    // $fillable permite la asigancion masiva
    protected $fillable = [
    'nombre', 'apellido', 'empresacliente', 'correo',
    'celular', 'direccion', 'codigopostal', 'contraseña', 'cedula'
    ];

    public function getAuthPassword()
    {
    return $this->contraseña;
    }

    public function producto(){
        return $this->hasMany(Producto::class);
    }
}

