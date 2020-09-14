<?php

namespace App\Http\Controllers\ppublic;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class TesoreriaController extends Controller
{
    public function index(Request $request)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        setlocale(LC_TIME, "spanish");

        return view('pagina.tesoreria.index');
    }
}
