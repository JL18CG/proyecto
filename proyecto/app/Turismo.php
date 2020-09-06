<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turismo extends Model
{
    protected $fillable = [
        'titulo','lugar','desc','fecha','tiempo'
    ];

}
