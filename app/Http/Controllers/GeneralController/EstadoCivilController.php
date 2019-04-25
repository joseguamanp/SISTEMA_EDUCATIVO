<?php

namespace App\Http\Controllers\Generales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EstadocivilRequest;
use App\EstadoCivilModel;
use Illuminate\Support\Facades\Auth;

class EstadoCivilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index()
    {
        $datos = EstadoCivilModel::withTrashed()->get();
        return view('admin.listasenescyt.datosidentificacion.estadocivil',['datos'=>$datos]);
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
    public function validarId($id,$etiqueta){
        EstadoCivilModel::create([
            'id'=>$id,
            'id_usu_cre' => Auth::user()->id,
            'etiqueta'=>strtoupper($etiqueta),            
            ]);
    }
    public function store(EstadocivilRequest $request)
    {        
        $next = EstadoCivilModel::withTrashed()->max('id');
        if($next == 0)
            $next = 1;
        else
            $next = $next + 1;
        $etiqueta = $request->input('etiqueta');        
        $this->validarId($next,$etiqueta);         
        
        return $this->index();
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
        $datosid = EstadoCivilModel::find($id);
        return view('admin.listasenescyt.datosidentificacion.editestadocivil',['editaret'=>$datosid]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstadocivilRequest $request, $id)
    {
        $datoset = EstadoCivilModel::find($id);
        $datoset->etiqueta = strtoupper($request->input('etiqueta')); 
        $datoset->id_usu_mod = Auth::user()->id;  
        $datoset->save();
        return redirect('/admin/estadocivil/'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datoset=EstadoCivilModel::find($id);
        $datoset->id_usu_mod = Auth::user()->id;
        $datoset->save();
        $datoset->delete();
        return redirect('/admin/estadocivil/');
    }
    public function restaurar($id)
    {
        $datos=EstadoCivilModel::onlyTrashed()->find($id)->restore();
        $datoset=EstadoCivilModel::find($id);
        $datoset->id_usu_mod = Auth::user()->id;
        $datoset->save();
        return redirect('/admin/estadocivil/');
    }
}
