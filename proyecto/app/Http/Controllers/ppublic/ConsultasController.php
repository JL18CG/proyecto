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
        $tipof = DB::table('tipo_consulta')->select('id','tipo')
        ->where('id_categoria_consulta','1')
        ->get(); 
        $tipov = DB::table('tipo_consulta')->select('id','tipo')
        ->where('id_categoria_consulta','2')
        ->get(); 
        $tipos = DB::table('tipo_consulta')->select('id','tipo')
        ->where('id_categoria_consulta','3')
        ->get(); 
        $tipop = DB::table('tipo_consulta')->select('id','tipo')
        ->where('id_categoria_consulta','4')
        ->get();
        return view('pagina.reportes-p.index',compact('tipof', 'tipov','tipos','tipop'));
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
            'cat_id' =>  $request->categoria,
            'tipo_id' =>  $request->tiporeporte,
            'contenido' =>  $request->descripcion,
            'prioridad' => $request->descripcion,
            'estado'=> 'P'
        ]);
        
        $tipof = DB::table('tipo_consulta')->select('id','tipo')
        ->where('id_categoria_consulta','1')
        ->get(); 
        $tipov = DB::table('tipo_consulta')->select('id','tipo')
        ->where('id_categoria_consulta','2')
        ->get(); 
        $tipos = DB::table('tipo_consulta')->select('id','tipo')
        ->where('id_categoria_consulta','3')
        ->get(); 
        $tipop = DB::table('tipo_consulta')->select('id','tipo')
        ->where('id_categoria_consulta','4')
        ->get();
        return view('pagina.reportes-p.index',compact('tipof', 'tipov','tipos','tipop'));
    }
}
