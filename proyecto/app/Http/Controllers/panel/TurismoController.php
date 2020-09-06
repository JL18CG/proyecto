<?php

namespace App\Http\Controllers\panel;
use App\Turismo;
use App\Sitio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TurismoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $turismo = Turismo::orderBy('created_at', 'desc')->paginate(10);
        $sitio = Sitio::orderBy('created_at', 'desc')->paginate(10);
        return view('panel.turismo.index', ['turismos' => $turismo, 'sitios' => $sitio]);
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
        $turismo = new Turismo();  
        return view('panel.turismo.create', compact('turismo')); 
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
                "titulo" => "required|min:3|max:110",
                "lugar" => "required|min:3|max:110",
                "desc" => "required|min:3|max:110",
                "fecha" => "required"
            ]);
            $noticia = Turismo::create([
                'titulo' =>  $request->titulo,
                'lugar' =>  $request->lugar,
                'desc' =>  $request->desc,
                'fecha' =>  $request->fecha,
                'tiempo' => $request->tiempo
            ]);

        return back()-> with('status', 'Evento Creado');
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
    public function edit(Turismo $turismo)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        return view('panel.turismo.edit', ['turismo' => $turismo]);
       

    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turismo $turismo)
    {
    
        $request -> validate([
            "titulo" => "required|min:3|max:110",
            "lugar" => "required|min:3|max:110",
            "desc" => "required|min:3|max:110",
            "fecha" => "required"
        ]);
        $turismo->update([
            'titulo' =>  $request->titulo,
            'lugar' =>  $request->lugar,
            'desc' =>  $request->desc,
            'fecha' =>  $request->fecha,
            'tiempo' => $request->tiempo
        ]);

    return back()-> with('status', 'Evento editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turismo = Turismo::findOrFail($id);
        DB::table('turismos')->where('id', '=', $id)->delete();
        return('hola prro');
    }
}
