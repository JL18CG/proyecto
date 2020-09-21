<?php

namespace App\Http\Controllers\ppublic;

use App\Reporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TesoreriaController extends Controller
{
    public function sevac(Request $request)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');


        $reportes = Reporte::select('titulo','archivo')->orderBy('created_at','desc')->where('tipo','sevac');
        
        if($request->has('busqueda')){
            $reportes = $reportes->where('titulo', 'like', '%'.request('busqueda').'%');
        }


        $reportes= $reportes->paginate(10);

        return view('pagina.tesoreria.sevac', compact('reportes'));
    }




    public function mensual(Request $request)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');


        $reportes = Reporte::select('titulo','archivo')->orderBy('created_at','desc')->where('tipo','general')->where('clas_reporte','mensual');
        
        if($request->has('busqueda')){
            $reportes = $reportes->where('titulo', 'like', '%'.request('busqueda').'%');
        }
        
        $reportes= $reportes->paginate(10);

        return view('pagina.tesoreria.mensual', compact('reportes'));
    }



    public function trimestral(Request $request)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');


        $reportes = Reporte::select('titulo','archivo')->orderBy('created_at','desc')->where('tipo','general')->where('clas_reporte','trimestral');
        
        if($request->has('busqueda')){
            $reportes = $reportes->where('titulo', 'like', '%'.request('busqueda').'%');
        }
        
        $reportes= $reportes->paginate(10);

        return view('pagina.tesoreria.trimestral', compact('reportes'));
    }

    public function anual(Request $request)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');

        
        $reportes = Reporte::select('titulo','archivo')->orderBy('created_at','desc')->where('tipo','general')->where('clas_reporte','anual');
        if($request->has('busqueda')){
            $reportes = $reportes->where('titulo', 'like', '%'.request('busqueda').'%');
        }
        $reportes= $reportes->paginate(10);

        return view('pagina.tesoreria.anual', compact('reportes'));
    }


    
    public function Dowload($archivo){
        return Storage::download('public/reportes/'.$archivo);

    }



    
}
