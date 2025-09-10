<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'descripcion', 'valor', 'categoria_id', 'unidad_id', 'imagen', 'user_id'
    ];

    public function categoria(){
        return $this->beLongsTo(Categoria::class);
    }
    public function unidad (){
        return $this->beLongsTo(Unidad::class);
    }

    public function usuario(){
        return $this->beLongsTo(Usuario::class, 'user_id');
    }
}
