<?php

namespace App\Http\Controllers\ppublic;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class DirectorioController extends Controller
{
    public function index()
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $directorios = DB::table('directorios')->select('id','nombre_completo','cargo','prioridad','tel_contacto','ext','correo_contacto','img')
        ->orderBy('prioridad','desc')->where('prioridad', null)
        ->get(); 
        $presidente = DB::table('directorios')->select('nombre_completo','cargo','tel_contacto','ext','correo_contacto','img')
        ->orderBy('prioridad','desc')->where('prioridad', '=', 1)
        ->get();

   
        return view('pagina.directorio.index',compact('directorios', 'presidente'));
    }
}
