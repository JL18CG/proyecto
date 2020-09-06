<?php

namespace App\Http\Controllers\ppublic;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class NoticiaController extends Controller
{
    public function index()
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $noticias = DB::table('noticias')->select('id','titulo','autor','url','descripcion','imagen','created_at')
        ->orderBy('created_at','desc')
        ->get();

        return view('pagina.noticias.index', compact('noticias'));
    }
}
