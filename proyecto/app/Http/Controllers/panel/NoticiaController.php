<?php

namespace App\Http\Controllers\panel;

use Image;
use App\Noticia;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Facade\FlareClient\Stacktrace\File;

class NoticiaController extends Controller
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
        $noticias = Noticia::orderBy('created_at', 'desc')->paginate(10);
        $categorias = Categoria::pluck('id','nombre'); 
        return view('panel.noticias.index', ['noticias' => $noticias, 'categorias'=>$categorias]);
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

        $categorias = Categoria::pluck('id','nombre');
        App::setLocale('es');
        return view('panel.noticias.create', ['noticia' => new Noticia(), 'categorias'=>$categorias]);
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
            'título' =>'required|min:3|max:110',
            'autor' =>'required|min:3|max:50',
            'contenido' =>'required|min:3|max:30000',
            'categorías'=>'required',
            'imagen'=>'required|mimes:jpg,jpeg,png|max:1024',
        ]);
        
        $filename = time() . "." . $request->imagen->extension();
        $destino = public_path('web/img/noticias');
        $path = $request->imagen->move($destino, $filename);

        $noticia = Noticia::create([
            'titulo' =>  $request->título,
            'autor' =>  $request->autor,
            'descripcion' =>  $request->contenido,
            'imagen' =>  $filename
        ]);

        $red = Image::make( $destino.'/'.$filename);
        $red->resize(300,null, function($constraint){
            $constraint->aspectRatio();
        });
        $red->save($destino.'/thumbs/'. $filename);

        $noticia->categorias()->sync($request->categorías);

        return back()->with('status', 'Noticia creada con exito');
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
    public function edit(Noticia $noticia)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');

        $categorias = Categoria::pluck('id','nombre');
        return view('panel.noticias.edit', ['noticia' => $noticia, 'categorias'=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
 
   
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $original_name= $noticia->imagen;
     
        $request->validate([
            'título' =>'required|min:3|max:110',
            'autor' =>'required|min:3|max:50',
            'contenido' =>'required|min:3|max:30000',
            'categorías'=>'required',
            'imagen'=>'mimes:jpg,jpeg,png|max:1024',
        ]);

        $res = $request->imagen;
        if($res == null){
            $noticia->update([
                'titulo' =>  $request->título,
                'autor' =>  $request->autor,
                'descripcion' =>  $request->contenido
            ]);
        }else{
            $filename = time() . "." . $request->imagen->extension();
            $destino = public_path('web/img/noticias');
            $destino_thumbs = public_path('web/img/noticias');
            $request->imagen->move($destino, $filename);
            $red = Image::make( $destino_thumbs.'/'.$filename);
            $red->resize(300,null, function($constraint){$constraint->aspectRatio();});
            $red->save($destino.'/thumbs/'. $filename);

            $noticia->update([
                'titulo' =>  $request->título,
                'autor' =>  $request->autor,
                'descripcion' =>  $request->contenido,
                'imagen' =>   $filename
            ]);

            $archivo = public_path('web/img/noticias/'.$original_name);
            $archivo_thumbs = public_path('web/img/noticias/thumbs/'.$original_name);
            if(file_exists($archivo)) unlink($archivo);
            if(file_exists($archivo_thumbs))unlink($archivo_thumbs);
        }
     

        
        
        $noticia->categorias()->sync($request->categorías);


       
        return back()->with('status', 'Noticia actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);

        $archivo = public_path('web/img/noticias/'.$noticia->imagen);
        $archivo_thumbs = public_path('web/img/noticias/thumbs/'.$noticia->imagen);

        if(file_exists($archivo)){
            unlink($archivo);
      
        }
      
        if(file_exists($archivo_thumbs)){
            unlink($archivo_thumbs);
      
        }
      

        $noticia->delete();


        DB::table('categoria_noticia')->where('noticia_id', '=', $id)->delete();
        return back()->with('status', 'Noticia Eliminada Correctamente');
    }


    public function categoria(Request $request)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');

        $request->validate(['nombre' =>'required|unique:categorias|min:3|max:110']);
        Categoria::create(['nombre' =>  $request->nombre]);

        return back()->with('status', 'Categoría creada con exito')->with('active','list');
    }


    
    public function categoria_update(Request $request, $id){
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $categoria = Categoria::findOrFail($id);
        $request->validate(['nombre' =>'required|unique:categorias|min:3|max:110']);
        $categoria->update(['nombre' =>  $request->nombre]);
        return back()->with('status', 'Categoría Actualizada con exito')->with('active','list');
    }


    public function categoria_delete($id)
    {
        $categoria = Categoria::findOrFail($id)->delete();
        DB::table('categoria_noticia')->where('categoria_id', '=', $id)->delete();
        return back()->with('status', 'Categoría Eliminada Correctamente')->with('active','list');
    }

}
