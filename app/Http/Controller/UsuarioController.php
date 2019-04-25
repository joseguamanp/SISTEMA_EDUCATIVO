<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;
use App\Rol;
use App\Roles_Usuario;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('admin');
    }
    public function index()
    {
        $rol=Rol::All();
        $usuario=User::withTrashed()->get();
        return view('admin.usuario.create',['rol'=>$rol,'user'=>$usuario]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        User::create([
            'cedula' => $request->input('cedula'),
            'password' => Hash::make($request->input('password')),
            'nombre' => strtoupper($request->input('nombre')),
            'apellido' => strtoupper($request->input('apellido')),
        ]);
        $id_user = User::where('cedula','=',$request->input('cedula'))->first();
        $roles=$request->input('rol');
        foreach ($roles as $value) {
            $numero=(int)$value;
           Roles_Usuario::create([
                'id_user'=>$id_user->id,
                'id_rol'=>$numero,
            ]);
        } 
        return redirect('admin/usuario')->with('mensaje','Usuario Creado exitosamente');;
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
    public function edit($id)
    {
        $usuario=User::find($id);
         $rol=Rol::All();
         $resultado=DB::table('rols')
        ->join('roles_usuarios','rols.id','=','roles_usuarios.id_rol')
        ->where('roles_usuarios.id_user','=',$usuario->id)
        ->select('rols.nombre','rols.id','rols.icono')
        ->get();
        return view('admin.usuario.edit',['rol'=>$rol,'user'=>$usuario,'rolusu'=>$resultado]);
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
        $usuario=User::find($id);
        $usuario->nombre=strtoupper($request->input('nombre'));
        $usuario->apellido=strtoupper($request->input('apellido'));
        $usuario->cedula=$request->input('cedula');
        $usuario->password=Hash::make($request->input('password'));
        $usuario->save();
        return redirect('/admin/usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect('/admin/usuario');
    }

    public function restaurar($id)
    {
        $datos=User::onlyTrashed()->find($id)->restore();
        return redirect('/admin/usuario');
    }

    public function clave(Resquets $resquet)
    {

        $data=User::where('password','=',Hash::make($request->input('claveactual')))->get();
        $hashedPassword=$data->password;
        if (Hash::check($request->input('clavenueva'), $hashedPassword)) {
            return "clave correcta";
        }else{
            return "clave incorrecta";
        }
    }
}
