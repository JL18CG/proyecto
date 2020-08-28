<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'token','nombre'
    ];


    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
