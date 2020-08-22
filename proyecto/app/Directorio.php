<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directorio extends Model
{
    protected $fillable = [
        'nombres','apellidos','cargo','formacion','tel_contacto','correo_contacto',
    ];
}
