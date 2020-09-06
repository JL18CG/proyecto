<?php

namespace App\Http\Controllers\panel;
use App\Sitio;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SitioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // 
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
        $sitio = new Sitio();  
        return view('panel.turismo.create_l', compact('sitio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $request -> validate([
            "nombre_lugar" => "required|min:3|max:110",
            "tipo_lugar" => "required|min:2",
            "ubicacion" => "required|min:3|max:110",
            "direccion" => "required|min:3|max:110",
            "descripcion" => "required|min:3|max:110",          
        ]);
        $sitio = Sitio::create([
            'nombre_lugar' =>  $request->nombre_lugar,
            'tipo_lugar' =>  $request->tipo_lugar,
            'ubicacion' =>  $request->ubicacion,
            'direccion' =>  $request->direccion,
            'descripcion' => $request->descripcion
        ]);

    return back()-> with('status', 'Sitio Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sitio $sitio)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        return view('panel.turismo.edit_l', ['sitio' => $sitio]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sitio = Sitio::findOrFail($id);
        DB::table('sitios')->where('id', '=', $id)->delete();
        return back()->with('status', 'Sitio Eliminado Correctamente');
    }
}
