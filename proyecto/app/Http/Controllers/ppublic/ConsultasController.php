<?php

namespace App\Http\Controllers\ppublic;
use App\Consulta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    public function index()
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        return view('pagina.reportes-p.index');
    }
    public function store(Request $request)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $request -> validate([
            "descripcion" => "required|min:3|max:255",
            "categoria" => "required",
            'tiporeporte'=>'required'
        ]);
          
        $request = Consulta::create([
            'cat' =>  $request->categoria,
            'tipo' =>  $request->tiporeporte,
            'contenido' =>  $request->descripcion,
            'estado'=> 'P'
        ]);

        return view('pagina.reportes-p.index');
    }
}
