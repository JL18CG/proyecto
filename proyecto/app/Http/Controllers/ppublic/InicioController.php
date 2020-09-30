<?php

namespace App\Http\Controllers\ppublic;

use App\Noticia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InicioController extends Controller
{
    public function index()
    {


        $noticias = Noticia::orderby('id','DESC')->select('titulo', 'imagen','url')->take(7)->get();
    

        return view('pagina.main', compact('noticias'));
    }
}
