<?php

namespace App\Http\Controllers\Generales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GeneroRequest;
use App\GeneroModel;
use Illuminate\Support\Facades\Auth;
class GeneroController extends Controller
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
        $datos = GeneroModel::withTrashed()->get();
        return view('admin.listasenescyt.datosidentificacion.genero',['datos'=>$datos]);
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
        GeneroModel::create([
            'id'=>$id,
            'id_usu_cre' => Auth::user()->id,
            'etiqueta'=>strtoupper($etiqueta),            
            ]);
    }
    public function store(GeneroRequest $request)
    {
        $next = GeneroModel::withTrashed()->max('id');
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
        $datosid = GeneroModel::find($id);
        return view('admin.listasenescyt.datosidentificacion.generoedit',['editaret'=>$datosid]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GeneroRequest $request, $id)
    {
        $datoset = GeneroModel::find($id);
        $datoset->etiqueta = strtoupper($request->input('etiqueta'));
        $datoset->id_usu_mod = Auth::user()->id;    
        $datoset->save();
        return redirect('/admin/genero/'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datoset=GeneroModel::find($id);
        $datoset->id_usu_mod = Auth::user()->id;
        $datoset->save();
        $datoset->delete();
        return redirect('/admin/genero/');
    }
    public function restaurar($id)
    {
        $datos=GeneroModel::onlyTrashed()->find($id)->restore();
        $datos=GeneroModel::find($id);
        $datos->id_usu_mod = Auth::user()->id;
        $datos->save();
        return redirect('/admin/genero/');
    }
}
