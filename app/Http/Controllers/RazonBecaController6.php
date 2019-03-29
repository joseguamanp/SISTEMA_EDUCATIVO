<?php

namespace App\Http\Controllers;

use App\RazonBeca6;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RazonBecaController6 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RazonBeca6::withTrashed()->get();
        return view('admin.razon6.index', ['data' =>$data] );
    }

    public function getId(){
        $id = RazonBeca6::whereRaw('id > ? or deleted_at <> null', [0])->get();
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
        $dato = RazonBeca6::create ([
            'id' => $this->getId(),
            'etiqueta'=> mb_strtoupper($request->input('etiqueta')),
            'id_usu_cre' => $id,
            'id_usu_mod' => $id,
        ]);
        return redirect('/admin/razon6/');
    }

    public function edit($id)
    {
        $data = RazonBeca6::find($id);
        return view('admin.razon6.edit', ["data"=>$data]);
    }

    public function update(Request $request, $id)
    {
        $data=RazonBeca6::find($id);
        $data->etiqueta=mb_strtoupper($request->input('etiqueta'));
        $data->id_usu_mod=Auth::user()->id;
        $data->save();
        return redirect('/admin/razon6/');
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
        $razon6=RazonBeca6::find($id);
        $razon6->delete();
        return redirect('/admin/razon6/');
    }

    public function restaurar($id){
        $data = RazonBeca6::onlyTrashed()->find($id)->restore();
        return redirect('/admin/razon6/');
    }
}
