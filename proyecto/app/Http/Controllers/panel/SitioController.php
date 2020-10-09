<?php

namespace App\Http\Controllers\panel;
use App\Sitio;
use App\Auditoria;
use App\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Image;

class SitioController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth','turismo']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // 
    }
    
    public function turismo(){
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $eventos = Evento::orderBy('created_at', 'desc')->paginate(10);
        $sitios = Sitio::orderBy('created_at', 'desc')->paginate(10);
        $link_turismo='active';
        return view('panel.turismo.index',compact('eventos','sitios','link_turismo'));
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
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');

        $request -> validate([
            'nombre_lugar' => "required|unique:sitios|min:3|max:110",
            'tipo_lugar' => "required",
            'ubicacion' => "required|min:3|max:250",
            'direccion' => "required|min:3|max:110",
            'descripcion' => "required|min:3|max:110", 
            'imagen'=>'required|mimes:jpg,jpeg,png|max:1024'        
        ]);

        $filename = time() . "." . $request->imagen->extension();
        $destino = public_path('web/img/sitios');
        $path = $request->imagen->move($destino, $filename);

        Sitio::create([
            'nombre_lugar' =>  $request->nombre_lugar,
            'tipo_lugar' =>  $request->tipo_lugar,
            'ubicacion' =>  $request->ubicacion,
            'direccion' =>  $request->direccion,
            'descripcion' => $request->descripcion,
            'img'=> $filename       
        ]);


        $red = Image::make( $destino.'/'.$filename);
        $destino = public_path('web/img/sitios');
        $red->resize(700,null, function($constraint){
            $constraint->aspectRatio();
        });
        $red->save($destino.'/thumbs/'. $filename);

        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Creó el Sitio Turistico "'.$request->nombre_lugar.'"'
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
    public function update(Request $request, Sitio $sitio)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $original_name= $sitio->img;
        $request -> validate([
            'nombre_lugar' => "required|min:3|max:110|unique:sitios,nombre_lugar,".$sitio->id,
            'tipo_lugar' => "required",
            'ubicacion' => "required|min:3|max:250",
            'direccion' => "required|min:3|max:110",
            'descripcion' => "required|min:3|max:110", 
            'imagen'=>'mimes:jpg,jpeg,png|max:1024'
        ]);


        $res = $request->imagen;
        if($res == null){
            $sitio->update([
                'nombre_lugar' =>  $request->nombre_lugar,
                'tipo_lugar' =>  $request->tipo_lugar,
                'ubicacion' =>  $request->ubicacion,
                'direccion' =>  $request->direccion,
                'descripcion' => $request->descripcion,
 
            ]);
        }else{
            $filename = time() . "." . $request->imagen->extension();
            $destino = public_path('web/img/sitios');
            $destino_thumbs = public_path('web/img/sitios');
            $request->imagen->move($destino, $filename);
            $red = Image::make( $destino_thumbs.'/'.$filename);
            $red->resize(700,null, function($constraint){$constraint->aspectRatio();});
            $red->save($destino.'/thumbs/'. $filename);

            $sitio->update([
                'nombre_lugar' =>  $request->nombre_lugar,
                'tipo_lugar' =>  $request->tipo_lugar,
                'ubicacion' =>  $request->ubicacion,
                'direccion' =>  $request->direccion,
                'descripcion' => $request->descripcion,
                'img'=> $filename   
            ]);

            $archivo = public_path('web/img/sitios/'.$original_name);
            $archivo_thumbs = public_path('web/img/sitios/thumbs/'.$original_name);
            if(file_exists($archivo)) unlink($archivo);
            if(file_exists($archivo_thumbs))unlink($archivo_thumbs);





        }

        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Actualizó el Sitio Turistico "'.$request->nombre_lugar.'"'
        ]);

        return back()-> with('status', 'Sitio editado correctamente');
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

        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Actualizó el Sitio Turistico "'.$sitio->nombre_lugar.'"'
        ]);

        return back()->with('status', 'Sitio Eliminado Correctamente');
    }
}
