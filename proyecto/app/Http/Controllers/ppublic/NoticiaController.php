<?php

namespace App\Http\Controllers\ppublic;

use App\Noticia;
use App\Categoria;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class NoticiaController extends Controller
{
    public function index(Request $request)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        setlocale(LC_TIME, "spanish");

        $noticias =Noticia::with('categorias')->select('id','titulo','autor','url','descripcion','imagen','created_at')->orderBy('created_at','desc');
        if($request->has('busqueda')){
            $noticias = $noticias->where('titulo', 'like', '%'.request('busqueda').'%');  
        }           
        $noticias = $noticias->simplePaginate(6);

  

     
        $categorias = DB::table('categorias')->select('id','nombre','url')->orderBy('created_at','asc')->get();

        return view('pagina.noticias.index', compact('noticias','categorias'));
    }

    public function categoria_busqueda($url)
    {

        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        setlocale(LC_TIME, "spanish");


        $categoria =Categoria::where('url', $url)->firstOrFail();
      
        $noticias= $categoria->noticias()->simplePaginate(6);
        $categorias = DB::table('categorias')->select('id','nombre','url')->orderBy('created_at','asc')->get();

 
        return view('pagina.noticias.categorias', compact('noticias','categorias'));
    }

    public function show($url)
    {

        setlocale(LC_TIME, "spanish");

        $noticia = DB::table('noticias')->select('id','titulo','autor','url','descripcion','imagen','created_at')
        ->where('url',$url)
        ->get();

        $fecha= date("d-m-Y", strtotime($noticia[0]->created_at));$dia = strftime("%A", strtotime($fecha));$dia_numero =strftime("%d", strtotime($fecha));$mes =strftime("%B", strtotime($fecha));$anio=strftime("%Y", strtotime($fecha));
        $publicacion = ucfirst(trans($dia)).' '.$dia_numero.' de '.ucfirst(trans($mes)).' de '.$anio;

        
        $categorias = DB::table('categorias')->select('id','nombre','url')->orderBy('created_at','asc')->get();
        return view('pagina.noticias.show', compact('noticia','categorias', 'publicacion'));
    }
}
