<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directorio extends Model
{
    protected $fillable = [
        'nombre_completo','cargo','prioridad','tel_contacto','ext','img',
    ];
}