<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OpcionRequest;
use App\Rol;
use App\opcione;
use Illuminate\Support\Facades\DB;
class OpcionController extends Controller
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
         $op=DB::table('rols')
        ->join('opciones','rols.id','=','opciones.id_rol')
        ->select('rols.nombre','opciones.id','opciones.nombre_opcion','opciones.fecha_cre','opciones.fecha_mod','opciones.deleted_at')
        ->get();
        return view('admin.opcion.create',['rol'=>$rol,'opcion'=>$op]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OpcionRequest $request)
    {

        $roles=$request->input('rol');
        
        $nombre=$request->input('nombre');
        foreach ($roles as $value) {
            $numero=(int)$value;
            $consulta=Rol::find($numero);
            $dato=strtolower($consulta->nombre);
            $url=substr($dato,0 , 5)."/".$nombre;
           opcione::create([
                'nombre_opcion'=>$nombre,
                'estado'=>'A',
                'id_rol'=>$numero,
                'url'=>$url,
            ]);
           $url='';
        } 
        return redirect("/admin/opcion");
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
        $opcion=opcione::find($id);
        $rol=Rol::All();
        return view('admin.opcion.edit',['opcion'=>$opcion,'rol'=>$rol]);
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
        $opcion=opcione::find($id);
        $opcion->nombre_opcion=strtolower($request->input('nombre_opcion'));
        $roles=$request->input('rol');
        foreach ($roles as $value) {
            $opcion->id_rol=$value;
        }
        $opcion->save();
        return redirect("/admin/opcion");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $opcion=opcione::find($id);
        $opcion->delete();
        return redirect('/admin/opcion');
    }
     public function restaurar($id)
    {
        $datos=opcione::onlyTrashed()->find($id)->restore();
        return redirect('/admin/opcion');
    }
}
