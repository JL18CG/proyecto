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
        $consultaPs = DB::table('consultas')->
        join('categoria_consulta','categoria_consulta.id','=','consultas.cat_id')->
        join('tipo_consulta','tipo_consulta.id','=','consultas.tipo_id')->where('estado', '=', 'P')
        ->select('consultas.id','consultas.contenido','consultas.created_at','tipo_consulta.tipo','categoria_consulta.categoria')
        ->paginate(10); 
        $consultaCs = DB::table('consultas')->
        join('categoria_consulta','categoria_consulta.id','=','consultas.cat_id')->
        join('tipo_consulta','tipo_consulta.id','=','consultas.tipo_id')->where('estado', '=', 'C')
        ->select('consultas.id','consultas.contenido','consultas.created_at','tipo_consulta.tipo','categoria_consulta.categoria')
        ->paginate(10); 
       return view('panel.consultas.index' ,compact('consultaPs','consultaCs'));
      
    }
    public function P(Request $request,$id)
    {           
    
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $request = DB::table('consultas')->where('id','=',$id)
        ->update(['estado' => 'C']);
        $consultaPs = DB::table('consultas')->
        join('categoria_consulta','consultas.cat_id','categoria_consulta.id')->
        join('tipo_consulta','consultas.tipo_id','tipo_consulta.id')->where('estado', '=', 'P')
        ->select('consultas.id','consultas.contenido','consultas.created_at','tipo_consulta.tipo','categoria_consulta.categoria')
        ->paginate(10); 
        $consultaCs = DB::table('consultas')->
        join('categoria_consulta','consultas.cat_id','categoria_consulta.id')->
        join('tipo_consulta','consultas.tipo_id','tipo_consulta.id')->where('estado', '=', 'C')
        ->select('consultas.id','consultas.contenido','consultas.created_at','tipo_consulta.tipo','categoria_consulta.categoria')
        ->paginate(10);
        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Reviso la consulta "'.$request.'"'
        ]);
        return view('panel.consultas.index',compact('consultaPs','consultaCs'));
    }
    public function C(Request $request,$id)
    {
        
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $request = DB::table('consultas')->where('id','=',$id)
              ->update(['estado' => 'P']);
        $consultaPs = DB::table('consultas')->
        join('categoria_consulta','consultas.cat_id','categoria_consulta.id')->
        join('tipo_consulta','consultas.tipo_id','tipo_consulta.id')->where('estado', '=', 'P')
        ->select('consultas.id','consultas.contenido','consultas.created_at','tipo_consulta.tipo','categoria_consulta.categoria')
        ->paginate(10);; 
        $consultaCs = DB::table('consultas')->
        join('categoria_consulta','consultas.cat_id','categoria_consulta.id')->
        join('tipo_consulta','consultas.tipo_id','tipo_consulta.id')->where('estado', '=', 'C')
        ->select('consultas.id','consultas.contenido','consultas.created_at','tipo_consulta.tipo','categoria_consulta.categoria')
        ->paginate(10);;
        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Quito la consulta revisada "'.$request.'"'
        ]);
        return view('panel.consultas.index',compact('consultaPs','consultaCs'));
    }
    public function show(Request $req, $id)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $consu = DB::table('consultas')->
        join('categoria_consulta','consultas.cat_id','categoria_consulta.id')->
        join('tipo_consulta','consultas.tipo_id','tipo_consulta.id')->where('consultas.id', '=', $id)
        ->select('consultas.id','consultas.contenido','consultas.created_at','tipo_consulta.tipo','categoria_consulta.categoria')->first();
        return view('panel.consultas.show', ["consu" => $consu]);
    }
}
