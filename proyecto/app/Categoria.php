<?php

namespace App;

use App\Noticia;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nombre','url'
    ];

    public function noticias()
    {
        return $this->belongsToMany(Noticia::class);
    }
}
