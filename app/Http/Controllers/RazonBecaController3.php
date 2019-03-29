<?php

namespace App\Http\Controllers;

use App\RazonBeca3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RazonBecaController3 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RazonBeca3::withTrashed()->get();
        return view('admin.razon3.index', ['data' =>$data] );
    }

    public function getId(){
        $id = RazonBeca3::whereRaw('id > ? or deleted_at <> null', [0])->get();
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
        $dato = RazonBeca3::create ([
            'id' => $this->getId(),
            'etiqueta'=> mb_strtoupper($request->input('etiqueta')),
            'id_usu_cre' => $id,
            'id_usu_mod' => $id,
        ]);
        return redirect('/admin/razon3/');
    }

    public function edit($id)
    {
        $data = RazonBeca3::find($id);
        return view('admin.razon3.edit', ["data"=>$data]);
    }

    public function update(Request $request, $id)
    {
        $data=RazonBeca3::find($id);
        $data->etiqueta=mb_strtoupper($request->input('etiqueta'));
        $data->id_usu_mod=Auth::user()->id;
        $data->save();
        return redirect('/admin/razon3/');
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
        $razon3=RazonBeca3::find($id);
        $razon3->delete();
        return redirect('/admin/razon3/');
    }

    public function restaurar($id){
        $data = RazonBeca3::onlyTrashed()->find($id)->restore();
        return redirect('/admin/razon3/');
    }
}
