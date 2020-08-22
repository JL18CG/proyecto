<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $fillable = [
        'tipo', 'contenido', 'email','nombre',
    ];
}
