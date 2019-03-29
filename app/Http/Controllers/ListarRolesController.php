<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Rol;
use App\opcione;
use App\Roles_Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ListarRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $id=Auth::user()->id;
        $r_usu=Array();
        $resultado=DB::table('rols')
        ->join('roles_usuarios','rols.id','=','roles_usuarios.id_rol')
        ->where('roles_usuarios.id_user','=',$id)
        ->select('rols.nombre','rols.id','rols.icono')
        ->get();
        foreach ($resultado as $value) {
           $request->session()->put($value->nombre, $value->id);
        }
        return view('listar.index',['rol'=>$resultado]);

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
    public function store(Request $request)
    {
        $docente=$request->session()->get('DOCENTE');
        $estudiante=$request->session()->get('ESTUDIANTE');
        $coordinador=$request->session()->get('COORDINADORES');
        $administracion=$request->session()->get('ADMINISTRADOR');
        $valor=$request->input('idrol');
        switch ($valor) {
            case $docente:
                    return $this->vista($docente);
                break;
            case $estudiante:
                    return $this->vista($estudiante);
                break;
            case $coordinador:
                    return $this->vista($coordinador);
                break;
            case $administracion:
                    return $this->vistaadmin($administracion);
                break;
            
            default:
                    return "no se le permite acceso por falsificacion :v";
                break;
        }

    }
    public function vista($value='')
    {
        $op=opcione::where('id_rol','=',$value)->get();
        return view('opciones.index',['op'=>$op]);
    }
    public function vistaadmin($value)
    {
        $op=opcione::where('id_rol','=',$value)->get();
        return view('opciones.index',['op'=>$op,'admin'=>$value]);
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
        //
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
        //
    }
}
