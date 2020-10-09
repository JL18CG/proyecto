<?php

namespace App\Http\Controllers\ppublic;

use App\Noticia;
use App\Categoria;
use Carbon\Carbon;
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

        $noticias =Noticia::with('categorias')->select('id','titulo','autor','url','descripcion','imagen','created_at')->orderBy('id','DESC');
        if($request->has('busqueda')){
            $noticias = $noticias->where('titulo', 'like', '%'.request('busqueda').'%');  
        }           
        $noticias = $noticias->Paginate(10);
      
        $categorias = DB::table('categorias')->select('id','nombre','url')->orderBy('created_at','asc')->get();

        

        return view('pagina.noticias.index', compact('noticias','categorias'));
    }

    public function categoria_busqueda($url)
    {  
      
        $comprovar = DB::table('categorias')->select('url')->get();
        if(!$comprovar->contains('url',$url)){
            return view('404');
        }

        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        setlocale(LC_TIME, "spanish");
        $url_active = $url;

        $categoria =Categoria::where('url', $url)->firstOrFail();      
        $noticias= $categoria->noticias()->simplePaginate(6);
        $categorias = DB::table('categorias')->select('id','nombre','url')->orderBy('created_at','asc')->get();

 
        return view('pagina.noticias.categorias', compact('noticias','categorias','url_active'));
    }

    public function show($url)
    {
        $comprovar = DB::table('noticias')->select('url')->get();
        if(!$comprovar->contains('url',$url)){
            return view('404');
        }
        setlocale(LC_TIME, "spanish");

        $noticia = DB::table('noticias')->select('id','titulo','autor','url','descripcion','imagen','created_at')
        ->where('url',$url)
        ->get();


        $date = Carbon::parse($noticia[0]->created_at);

        $fecha= date("d-m-Y", strtotime($noticia[0]->created_at));$dia = strftime("%A", strtotime($fecha));$dia_numero =strftime("%d", strtotime($fecha));$mes =strftime("%B", strtotime($fecha));$anio=strftime("%Y", strtotime($fecha));
        $publicacion = ucfirst(trans($dia)).' '.$dia_numero.' de '.ucfirst(trans($mes)).' de '.$anio;

        
        $categorias = DB::table('categorias')->select('id','nombre','url')->orderBy('created_at','asc')->get();
        return view('pagina.noticias.show', compact('noticia','date','categorias', 'publicacion'));
    }
}
