<?php

namespace App\Http\Controllers\panel;

use Image;
use App\Auditoria;
use App\Directorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class DirectorioController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth','directorio']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $directorios = DB::table('directorios')->select('id','nombre_completo','cargo','prioridad','tel_contacto','ext','img')
                                                ->orderBy('prioridad','desc')
                                                ->get(); 

        $link_directorio ="active";
        return view('panel.directorios.index', ['directorios' => $directorios,'link_directorio'=> $link_directorio]);
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
        $link_directorio ="active";
        $directorio = new Directorio();
        return view('panel.directorios.create', compact('link_directorio','directorio'));
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
            'nombre' =>'required|min:8|max:110',
            'cargo' =>'required|min:3|max:50',
            'prioridad' => 'required|unique:directorios',
            'phone'=>'required|numeric|digits_between:7,10',
            'ext'=>'max:3',
            'imagen'=>'required|mimes:jpg,jpeg,png|max:512',
        ]);
             
        if($request->prioridad == "1"){
            $estado="1";
        }else{
           $estado=null;
        }

        $destino = public_path('web/img/directorio');
        $data = getimagesize($request->imagen);$width = $data[0];$height = $data[1];
        $filename = time() . "." . $request->imagen->extension();
        $path = $request->imagen->move($destino, $filename);   
        if($width!=300){$red = Image::make( $destino.'/'.$filename);
            $red->resize(300,null, function($constraint){
                $constraint->aspectRatio();
            });
            $red->save($destino.'/'.$filename);
        }      

        

        $noticia = Directorio::create([
            'nombre_completo' =>  $request->nombre,
            'cargo' =>  $request->cargo,
            'prioridad' => $estado,
            'tel_contacto' =>  $request->phone,
            'ext'=>$request->ext,
            'img' => $filename 
        ]);

        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Creó el Directorio "'.$request->cargo.'"'
        ]);

        return back()->with('status', 'Directorio creado correctamente');
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
    public function edit(Directorio $directorio)
    {
        $link_directorio ="active";
        return view('panel.directorios.edit',compact('directorio','link_directorio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Directorio $directorio)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $original_name= $directorio->img;
        $request->validate([
            'nombre' =>'required|min:8|max:110',
            'cargo' =>'required|min:3|max:50',
            'prioridad' => 'required|unique:directorios,prioridad,'.$directorio->id,
            'phone'=>'required|numeric|digits_between:7,10',
            'ext'=>'max:3',
            'imagen'=>'mimes:jpg,jpeg,png|max:512',
        ]);

        if($request->prioridad == "1"){
            $estado="1";
        }else{
           $estado=null;
        }


        $res = $request->imagen;

        if($res == null){
            $directorio->update([
                'nombre_completo' =>  $request->nombre,
                'cargo' =>  $request->cargo,
                'prioridad' =>  $estado,
                'tel_contacto' =>  $request->phone,
                'ext' =>  $request->ext
            ]);
        }else{
            $destino = public_path('web/img/directorio');
            $data = getimagesize($request->imagen);$width = $data[0];$height = $data[1];
            $filename = time() . "." . $request->imagen->extension();
            $path = $request->imagen->move($destino, $filename);   
            if($width!=300){$red = Image::make( $destino.'/'.$filename);
                $red->resize(300,null, function($constraint){
                    $constraint->aspectRatio();
                });
                $red->save($destino.'/'.$filename);
            }      

            $directorio->update([
                'nombre_completo' =>  $request->nombre,
                'cargo' =>  $request->cargo,
                'prioridad' =>  $estado,
                'tel_contacto' =>  $request->phone,
                'ext' =>  $request->ext,
                'img' => $filename
            ]);
            $archivo = public_path('web/img/directorio/'.$original_name);
            if(file_exists($archivo)) unlink($archivo);


        }

        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Actualizó el Directorio "'.$request->cargo.'"'
        ]);

        return back()->with('status', 'Directorio actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $directorio = Directorio::findOrFail($id);

        $archivo = public_path('web/img/directorio/'.$directorio->img);

        if(file_exists($archivo)){unlink($archivo);}
      
        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Eliminó el Directorio "'.$directorio->cargo.'"'
        ]);

        $directorio->delete();


        return back()->with('status', 'Directorio eliminado correctamente');
    }
}
