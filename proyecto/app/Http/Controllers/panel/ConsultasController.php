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
        join('categoria_consulta','consultas.cat_id','categoria_consulta.id')->
        join('tipo_consulta','consultas.tipo_id','tipo_consulta.id')->where('estado', '=', 'P')
        ->get(); 
        $consultaCs = DB::table('consultas')->
        join('categoria_consulta','consultas.cat_id','categoria_consulta.id')->
        join('tipo_consulta','consultas.tipo_id','tipo_consulta.id')->where('estado', '=', 'C')
        ->get(); 
       return view('panel.consultas.index' ,compact('consultaPs','consultaCs'));
      
    }
    public function P(Consulta $consulta)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $consulta = DB::table('consultas')
        ->update(['estado' => 'C']);
        $consultaPs = DB::table('consultas')->
        join('categoria_consulta','consultas.cat_id','categoria_consulta.id')->
        join('tipo_consulta','consultas.tipo_id','tipo_consulta.id')->where('estado', '=', 'P')
        ->get(); 
        $consultaCs = DB::table('consultas')->
        join('categoria_consulta','consultas.cat_id','categoria_consulta.id')->
        join('tipo_consulta','consultas.tipo_id','tipo_consulta.id')->where('estado', '=', 'C')
        ->get();
        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Reviso la consulta "'.$consulta.'"'
        ]);
        return view('panel.consultas.index',compact('consultaPs','consultaCs'));
    }
    public function C(Consulta $consulta)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $consulta = DB::table('consultas')
              ->update(['estado' => 'P']);
        $consultaPs = DB::table('consultas')->
        join('categoria_consulta','consultas.cat_id','categoria_consulta.id')->
        join('tipo_consulta','consultas.tipo_id','tipo_consulta.id')->where('estado', '=', 'P')
        ->get(); 
        $consultaCs = DB::table('consultas')->
        join('categoria_consulta','consultas.cat_id','categoria_consulta.id')->
        join('tipo_consulta','consultas.tipo_id','tipo_consulta.id')->where('estado', '=', 'C')
        ->get();
        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Quito la consulta revisada "'.$consulta.'"'
        ]);
        return view('panel.consultas.index',compact('consultaPs','consultaCs'));
    }
    public function show(Consulta $consulta)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $consu = Consulta::
        join('categoria_consulta','consultas.cat_id','categoria_consulta.id')->
        join('tipo_consulta','consultas.tipo_id','tipo_consulta.id')->first();
    
        return view('panel.consultas.show', ["consu" => $consu]);
    }
}
