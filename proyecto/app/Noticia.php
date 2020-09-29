<?php

namespace App;

use App\Categoria;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = [
        'titulo', 'autor', 'descripcion','imagen','url'
    ];

    public function tags(){

    }


    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }
}
