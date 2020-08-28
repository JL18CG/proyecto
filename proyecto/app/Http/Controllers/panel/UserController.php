<?php

namespace App\Http\Controllers\panel;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserPost;

class UserController extends Controller
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

        $usuarios = User::orderby('created_at','desc')->paginate(10);
        $list = Role::orderby('created_at','desc')->paginate(10);
        $active ="active";


        return view('panel.user.index', compact('usuarios','active','list'));
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
        $usuario = User::create($request->validated());
        $usuario->roles()->sync($request->roles);

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
        $usuario->roles()->detach();
        $usuario->delete();
        return back()-> with('status', 'Usuario Eliminado');
    }



    public function role(Request $request)
    {
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $request->validate([ 'nombre' =>'required|unique:roles|min:3|max:110', 'descripcion' => 'required|max:110' ]);
        Role::create(['nombre' =>  $request->descripcion, 'token' => $request->nombre]);

        return back()->with('status', 'Rol Creado Correctamente')->with('active-rol','list');
    }
    
    public function role_update(Request $request, $id){
        App::setLocale('es');
        date_default_timezone_set('America/Chihuahua');
        $categoria = Role::findOrFail($id);
        $request->validate([ 'nombre' =>'required|unique:roles|min:3|max:110', 'descripcion' => 'required|max:110' ]);
        $categoria->update(['nombre' =>  $request->descripcion, 'token' => $request->nombre]);
        return back()->with('status', 'Rol Actualizado')->with('active-rol','list');
    }


    public function role_delete($id)
    {
        $categoria = Role::findOrFail($id)->delete();
        DB::table('role_user')->where('role_id', '=', $id)->delete();
        return back()->with('status', 'Rol Eliminado')->with('active-rol','list');
    }


}
