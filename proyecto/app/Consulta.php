<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = [
        'contenido','cat_id','tipo_id','estado'
    ];
}
