<?php

namespace App\Http\Controllers\panel;

use App\Role;
use App\User;
use App\Auditoria;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserPost;

class UserController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'admin']);
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

        $usuarios = User::orderby('created_at', request('created_at','DESC'));

        if($request->has('busqueda')){
            $usuarios = $usuarios->where('name', 'like', '%'.request('busqueda').'%');  
        }
                          
        $usuarios = $usuarios->paginate(5);


        $users = DB::table('users')->select('id', 'name')->get();
        $list = Role::orderby('created_at','desc')->paginate(15);
        $active ="active";

        $auditorias = Auditoria::orderby('created_at', request('created_at','DESC'));
        if($request->has('auditoria_usuario')){
            if($request->auditoria_usuario == 'all'){
                
            }else{
                $auditorias = $auditorias->where('user_id', '=', request('auditoria_usuario'));  
            }
            
        }
                          
        $auditorias = $auditorias->paginate(18);
       

  
        



        return view('panel.user.index', compact('usuarios','active','list','auditorias','users'));
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

        $active ="active";
        $roles = Role::pluck('id','nombre'); 

        $active ="active";
        $usuario = new User();


        return view('panel.user.create', compact('usuario','roles','active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPost $request)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $usuario = User::create($request->validated());
        $usuario->roles()->sync($request->roles);

        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Creó el Usuario "'.$request->name.' '.$request->apellidos.'"'
        ]);
        return back()-> with('status', 'Usuario Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {   

        $active ="active";
        $roles = Role::pluck('id','nombre'); 

        return view('panel.user.edit', compact('usuario','active','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        

        $request->validate([
            'name' => 'required|min:3|max:40', 
            'apellidos' => 'required|min:3|max:50',
            'email' =>'required|email|unique:users,email,'.$usuario->id,
            'telefono'=>'required|numeric|digits_between:7,10',
            'roles'=>'required',
        ]);


       
        if($request->password){
            
            $request->validate([
                'password' => 'min:8',
            ]);
       
            $usuario->update([
                'name' =>  $request->name,
                'apellidos' =>  $request->apellidos,
                'email' =>  $request->email,
                'password' =>   $request->password,
                'telefono' =>   $request->telefono,
            ]);
        }else{
            $usuario->update([
                'name' =>  $request->name,
                'apellidos' =>  $request->apellidos,
                'email' =>  $request->email,
                'telefono' =>   $request->telefono,
            ]);
        }

        

        $usuario->roles()->sync($request->roles);
        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Actualizó el Usuario "'.$request->name.' '.$request->apellidos.'"'
        ]);
       return back()-> with('status', 'Usuario Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $usuario->roles()->detach();
        $usuario->delete();

        DB::table('auditorias')->where('user_id', '=', $usuario->id)->delete();

        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Eliminó el Usuario "'.$usuario->name.' '.$usuario->apellidos.'"'
        ]);
        return back()-> with('status', 'Usuario Eliminado');
    }



    public function role(Request $request)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $request->validate([ 'nombre' =>'required|unique:roles,token|min:3|max:110', 'descripcion' => 'required|max:110' ]);
        $slug = Str::slug($request->nombre,'_');
        $nombre_valid = Str::studly($slug);

        Role::create(['token' => $nombre_valid,'nombre' =>  $request->descripcion]);
        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Creó el Rol de Usuario "'.$nombre_valid.'"'
        ]);
        return back()->with('status', 'Rol Creado Correctamente')->with('active-rol','list');
    }
    
    public function role_update(Request $request, $id){
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $categoria = Role::findOrFail($id);
        $request->validate([ 'nombre' =>'required|unique:roles|min:3|max:110', 'descripcion' => 'required|max:110' ]);
        $categoria->update(['nombre' =>  $request->descripcion, 'token' => $request->nombre]);
        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Actualizó el Rol de Usuario "'.$categoria->nombre.'"'
        ]);
        return back()->with('status', 'Rol Actualizado')->with('active-rol','list');
    }


    public function role_delete($id)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $rol = Role::findOrFail($id);
        $rol->users()->detach();
        $rol->delete();

        DB::table('role_user')->where('role_id', '=', $id)->delete();

        Auditoria::create([
            'user_id' => auth()->user()->id,
            'descripcion' => 'Eliminó el Rol de Usuario "'.$rol->token.'"'
        ]);

        return back()->with('status', 'Rol Eliminado')->with('active-rol','list');
    }


}
