<?php

namespace App\Http\Controllers\panel;

use Image;
use App\Noticia;
use App\Auditoria;
use App\Categoria;
use Carbon\Carbon;
use App\Helpers\CustomUrl;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Facade\FlareClient\Stacktrace\File;

class NoticiaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth','noticia']);
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

        setlocale(LC_TIME, "spanish");
        $noticias = Noticia::orderby('created_at', request('created_at','DESC'));
        if($request->has('busqueda')){
            $noticias = $noticias->where('titulo', 'like', '%'.request('busqueda').'%');  
        }
                          
        $noticias = $noticias->paginate(12);


        $categorias = Categoria::orderby('created_at', 'desc')->pluck('id','nombre'); 

        $link_noticia ="active";
        return view('panel.noticias.index', compact('noticias','categorias','link_noticia'));
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
        $link_noticia ="active";
        $noticia = new Noticia();

        return view('panel.noticias.create', compact('noticia','categorias','link_noticia'));
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
            'titulo' =>'required|min:3|max:250|unique:noticias,titulo',
            'autor' =>'required|min:3|max:50',
            'contenido' =>'required|min:3|max:20000',
            'categorias'=>'required',
            'imagen'=>'required|mimes:jpg,jpeg,png|max:1024',
        ]);
        
        $filename = time() . "." . $request->imagen->extension();
        $destino = public_path('web/img/noticias');
        $path = $request->imagen->move($destino, $filename);

        $url_limpia = Str::slug($request->titulo);
    
        
        
        $noticia = Noticia::create([
            'titulo' =>  $request->titulo,
            'autor' =>  $request->autor,
            'url' => $url_limpia,
            'descripcion' =>  $request->contenido,
            'imagen' =>  $filename
        ]);


        $red = Image::make( $destino.'/'.$filename);
        $red->resize(500,null, function($constraint){
            $constraint->aspectRatio();
        });
        $red->save($destino.'/thumbs/'. $filename);

        $noticia->categorias()->sync($request->categorias);

        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Creó la Noticia "'.$request->titulo.'"'
        ]);
        return back()->with('status', 'Noticia creada correctamente');
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
        $link_noticia ="active";
        return view('panel.noticias.edit', ['noticia' => $noticia, 'categorias'=>$categorias, 'link_noticia'=> $link_noticia]);
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
 
        $url_limpia = CustomUrl::urlTitle(CustomUrl::convertAccentedCharacters($request->titulo), "-", true);

        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $original_name= $noticia->imagen;
        $request->validate([
            'titulo' =>'required|min:3|max:250|unique:noticias,titulo,'.$noticia->id,
            'autor' =>'required|min:3|max:50',
            'contenido' =>'required|min:3|max:20000',
            'categorias'=>'required',
            'imagen'=>'mimes:jpg,jpeg,png|max:1024',
        ]);
        
        $res = $request->imagen;
        if($res == null){
            $noticia->update([
                'titulo' =>  $request->titulo,
                'url' => $url_limpia,
                'autor' =>  $request->autor,
                'descripcion' =>  $request->contenido
            ]);
        }else{
            $filename = time() . "." . $request->imagen->extension();
            $destino = public_path('web/img/noticias');
            $destino_thumbs = public_path('web/img/noticias');
            $request->imagen->move($destino, $filename);
            $red = Image::make( $destino_thumbs.'/'.$filename);
            $red->resize(500,null, function($constraint){$constraint->aspectRatio();});
            $red->save($destino.'/thumbs/'. $filename);

            $noticia->update([
                'titulo' =>  $request->titulo,
                'url' => $url_limpia,
                'autor' =>  $request->autor,
                'descripcion' =>  $request->contenido,
                'imagen' =>   $filename
            ]);

            $archivo = public_path('web/img/noticias/'.$original_name);
            $archivo_thumbs = public_path('web/img/noticias/thumbs/'.$original_name);
            if(file_exists($archivo)) unlink($archivo);
            if(file_exists($archivo_thumbs))unlink($archivo_thumbs);
        }
     

        
        
        $noticia->categorias()->sync($request->categorias);

        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Actualizó la Noticia "'.$request->titulo.'"'
        ]);

        return back()->with('status', 'Noticia actualizada correctamente');
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

        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Actualizó la Noticia "'.$noticia->titulo.'"'
        ]);


        return back()->with('status', 'Noticia eliminada correctamente');
    }


    public function categoria(Request $request)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');

        $request->validate(['nombre' =>'required|unique:categorias|min:3|max:110']);
        Categoria::create(['nombre' =>  $request->nombre, 'url'=>Str::slug($request->nombre) ]);
        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Creó la Categoría de Noticia "'.$request->nombre.'"'
        ]);

        return back()->with('status', 'Categoría creada correctamente')->with('active','list');
    }


    
    public function categoria_update(Request $request, $id, Categoria $cate){
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $categoria = Categoria::findOrFail($id);


        $request->validate(
            [
                'nombre' =>'min:3|max:110|required|unique:categorias,nombre,'.$id
            ]);
        $categoria->update(['nombre' =>  $request->nombre, 'url'=>Str::slug($request->nombre)]);
 
        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Actualizó la Categoría de Noticia "'.$categoria->nombre.'"'
        ]);

        return back()->with('status', 'Categoría actualizada correctamente')->with('active','list');
    }


    public function categoria_delete($id)
    {
        $categoria = Categoria::findOrFail($id);

        

        DB::table('categoria_noticia')->where('categoria_id', '=', $id)->delete();

        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Eliminó la Categoría de Noticia "'.$categoria->nombre.'"'
        ]);

        $categoria->delete();

        return back()->with('status', 'Categoría eliminada correctamente')->with('active','list');
    }

}
