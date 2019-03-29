<?php

namespace App\Http\Controllers\admin\datosidentificacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TipodocumentoRequest;
use App\tipodocumento;
use Illuminate\Support\Facades\Auth;

class tipodocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response+
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index()
    {
        $datos = tipodocumento::withTrashed()->get();
        return view('admin.listasenescyt.datosidentificacion.create',['tipodoc'=>$datos]);
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
    public function store(TipodocumentoRequest $request)
    {        
        $next = tipodocumento::withTrashed()->max('id');
        if($next == 0)
            $next = 1;
        else
            $next = $next + 1;
        $dato = tipodocumento::create ([
            'id' => $next,
            'id_usu_cre' => Auth::user()->id,
            'etiqueta'=> strtoupper($request->input('etiqueta')),
        ]);
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
        $tipodoc = tipodocumento::find($id);
        return view('admin.listasenescyt.datosidentificacion.editar',['editardoc'=>$tipodoc]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipodocumentoRequest $request, $id)
    {
        $tipodoc = tipodocumento::find($id);
        $tipodoc->etiqueta = strtoupper($request->input('etiqueta'));
        $tipodoc->id_usu_mod = Auth::user()->id;
        $tipodoc->save();
        return redirect('/admin/datostipodoc/'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipodoc=tipodocumento::find($id);
        $tipodoc->id_usu_mod = Auth::user()->id;
        $tipodoc->save();
        $tipodoc->delete();
        return redirect('/admin/datostipodoc/');
    }

     public function restaurar($id)
    {
        $datos=tipodocumento::onlyTrashed()->find($id)->restore();
        $tipodoc=tipodocumento::find($id);
        $tipodoc->id_usu_mod = Auth::user()->id;
        return redirect('/admin/datostipodoc/');
    }
}
