<?php

namespace App\Http\Controllers\ppublic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        return view('pagina.main');
    }
}
