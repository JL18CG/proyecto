<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Consulta;
use App\Auditoria;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    public function index(Request $request)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $consultaPs = DB::table('consultas')->where('estado', '=', 'P')->paginate(10); 
        $consultaCs = DB::table('consultas')->where('estado', '=', 'C')->paginate(10);
       return view('panel.consultas.index' ,compact('consultaPs','consultaCs'));
      
    }
    public function P(Request $request,$id)
    {           
    
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $request = DB::table('consultas')->where('id','=',$id)
        ->update(['estado' => 'C']);
        $consultaPs = DB::table('consultas')->where('estado', '=', 'P')->paginate(10); 
        $consultaCs = DB::table('consultas')->where('estado', '=', 'C')->paginate(10);
        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Revisó la consulta "'.$request.'"'
        ]);
        return view('panel.consultas.index',compact('consultaPs','consultaCs'));
    }
    public function C(Request $request,$id)
    {
        
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $request = DB::table('consultas')->where('id','=',$id)
              ->update(['estado' => 'P']);
              $consultaPs = DB::table('consultas')->where('estado', '=', 'P')->paginate(10); 
              $consultaCs = DB::table('consultas')->where('estado', '=', 'C')->paginate(10);
        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Quitó la consulta revisada "'.$request.'"'
        ]);
        return view('panel.consultas.index',compact('consultaPs','consultaCs'));
    }
    public function show(Request $req, $id)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $consu = Consulta::first();
        return view('panel.consultas.show', ["consu" => $consu]);
    }
}
