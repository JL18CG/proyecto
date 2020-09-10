<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'titulo','lugar','desc','fecha','tiempo','img'
    ];
}
