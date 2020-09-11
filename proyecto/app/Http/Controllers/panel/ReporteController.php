<?php

namespace App\Http\Controllers\panel;

use App\Reporte;
use App\Auditoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ReporteController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua'); 

        $reportes = DB::table('reportes')->select('id','tipo','titulo','archivo','created_at')
        ->orderBy('created_at','ASC')->paginate(12);


        $link_reportes= "active";
        return view('panel.reportes.index', compact('link_reportes','reportes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $reporte = new Reporte();
        return view('panel.reportes.create',compact('reporte'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');

  
        $request->validate([
            'reporte' =>'required',
            'clasificacion' =>'required',
            'nombre' =>'required|min:3|max:70',
            'pdf'=>'required',
        ]);

  

      
        $ext = $request->pdf->getClientOriginalExtension();
        $ldate = "reporte".date('Y_m_d_H_i_s').'.'.$ext;
        $path = $request->file('pdf')->storeAs(
            'public/reportes', $ldate
        );



       $reporte= Reporte::create([
            'tipo' =>  $request->reporte,
            'clas_reporte' =>  $request->clasificacion,
            'titulo' => $request->nombre,
            'archivo' =>  $ldate
        ]);

     
        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Añadió en Reportes el Archivo "'.$request->nombre.'"'
        ]);




        return back()->with('status', 'Reporte Registrado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');


        $archivo = storage_path('app/public/reportes/reporte2020_09_10_16_51_52.pdf');


        if(file_exists($archivo)){
            unlink($archivo);      
        }

        
    }
}
