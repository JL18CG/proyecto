<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    protected $fillable = [
        'user_id','descripcion',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}