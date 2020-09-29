<?php

namespace App\Http\Controllers\panel;

use Image;
use App\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class EventoController extends Controller
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
    public function index()
    {
       
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
        $evento = new Evento();  
        return view('panel.turismo.create', compact('evento')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Evento $evento)
    {       
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');


            $request -> validate([
                "titulo" => "required|min:3|max:110",
                "lugar" => "required|min:3|max:110",
                "desc" => "required|min:3|max:110",
                "fecha" => "required",
                'imagen'=>'required|mimes:jpg,jpeg,png|max:1024'
            ]);

            $filename = time() . "." . $request->imagen->extension();
            $destino = public_path('web/img/evts');
            $path = $request->imagen->move($destino, $filename);


            Evento::create([
                'titulo' =>  $request->titulo,
                'lugar' =>  $request->lugar,
                'desc' =>  $request->desc,
                'fecha' =>  $request->fecha,
                'tiempo' => $request->tiempo,
                'img' =>   $filename
            ]);

            $red = Image::make( $destino.'/'.$filename);
            $destino = public_path('web/img/evts/');
            $red->resize(300,null, function($constraint){
                $constraint->aspectRatio();
            });
            $red->save($destino.'/thumbs/'. $filename);

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
    public function edit(Evento $evento)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        return view('panel.turismo.edit',compact('evento'));
       

    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $original_name= $evento->img;
        $request -> validate([
            "titulo" => "required|min:3|max:110",
            "lugar" => "required|min:3|max:110",
            "desc" => "required|min:3|max:110",
            "fecha" => "required"
        ]);


        $res = $request->imagen;

        if($res == null){
            $evento->update([
                'titulo' =>  $request->titulo,
                'lugar' =>  $request->lugar,
                'desc' =>  $request->desc,
                'fecha' =>  $request->fecha,
                'tiempo' => $request->tiempo,
            ]);
        }else{
            $filename = time() . "." . $request->imagen->extension();
            $destino = public_path('web/img/evts');
            $destino_thumbs = public_path('web/img/evts');
            $request->imagen->move($destino, $filename);
            $red = Image::make( $destino_thumbs.'/'.$filename);
            $red->resize(300,null, function($constraint){$constraint->aspectRatio();});
            $red->save($destino.'/thumbs/'. $filename);

            $evento->update([
                'titulo' =>  $request->titulo,
                'lugar' =>  $request->lugar,
                'desc' =>  $request->desc,
                'fecha' =>  $request->fecha,
                'tiempo' => $request->tiempo,
                'img' =>   $filename
            ]);

            $archivo = public_path('web/img/evts/'.$original_name);
            $archivo_thumbs = public_path('web/img/evts/thumbs/'.$original_name);
            if(file_exists($archivo)) unlink($archivo);
            if(file_exists($archivo_thumbs))unlink($archivo_thumbs);





        }


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
        $evento = Evento::findOrFail($id);
        DB::table('eventos')->where('id', '=', $id)->delete();


        return back()->with('status', 'Evento Eliminado Correctamente');
    }
}
