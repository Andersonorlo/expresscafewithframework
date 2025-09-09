<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

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
