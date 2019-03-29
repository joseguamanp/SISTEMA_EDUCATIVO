<?php

namespace App\Http\Controllers;

use App\RazonBeca2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RazonBecaController2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RazonBeca2::withTrashed()->get();
        return view('admin.razon2.index', ['data' =>$data] );
    }
    public function getId(){
        $id = RazonBeca2::whereRaw('id > ? or deleted_at <> null', [0])->get();
        $next = count($id);
        if($next > 0 ){
            $next+=1;
        }else
            $next =1;
        return $next;
    }
    public function store(Request $request)
    {
        $id=Auth::user()->id;
        $dato = RazonBeca2::create ([
            'id' => $this->getId(),
            'etiqueta'=> mb_strtoupper($request->input('etiqueta')),
            'id_usu_cre' => $id,
            'id_usu_mod' => $id,
        ]);
        return redirect('/admin/razon2/');
    }

    public function edit($id)
    {
        $data = RazonBeca2::find($id);
        return view('admin.razon2.edit', ["data"=>$data]);
    }

    public function update(Request $request, $id)
    {
        $data=RazonBeca2::find($id);
        $data->etiqueta=mb_strtoupper($request->input('etiqueta'));
        $data->id_usu_mod=Auth::user()->id;
        $data->save();
        return redirect('/admin/razon2/');
    }
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
    public function destroy($id)
    {
        $razon2=RazonBeca2::find($id);
        $razon2->delete();
        return redirect('/admin/razon2/');
    }

    public function restaurar($id){
        $data = RazonBeca2::onlyTrashed()->find($id)->restore();
        return redirect('/admin/razon2/');
    }
}
