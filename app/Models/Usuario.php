<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuarios';

    // proteccion contra vulnerabiliades o ataques.
    // $fillable permite la asigancion masiva
    protected $fillable = [
        'nombre',
        'apellido',
        'empresacliente',
        'email',
        'celular',
        'direccion',
        'codigopostal',
        'password',
        'cedula',
        'rol',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function getAuthPassword()
    {
        return $this->password;
    }

    public function producto()
    {
        return $this->hasMany(Producto::class);
    }
}
