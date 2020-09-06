<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sitio extends Model
{
    protected $fillable = [
        'nombre_lugar','tipo_lugar','ubicacion','direccion','descripcion'
    ];
}
