<?php

namespace App\Http\Controllers;

use App\PenDiferenciada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PenDiferenciada::withTrashed()->get();
        return view('admin.PoseePension.index', ['data' =>$data] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    public function getId(){
        $id = PenDiferenciada::whereRaw('id > ? or deleted_at <> null', [0])->get();
        $next = count($id);
        if($next > 0 ){
            $next+=1;
        }else
            $next =1;
        return $next;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $dato = PenDiferenciada::create ([
            'id' => $this->getId(),
            'etiqueta'=> mb_strtoupper($request->input('etiqueta')),
            'id_usu_cre' => $id,
            'id_usu_mod' => $id,
        ]);
        return redirect('/admin/PoseePension');
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
        $data = PenDiferenciada::find($id);
        return view('admin.PoseePension.edit', ["data"=>$data]);
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
        $data=PenDiferenciada::find($id);
        $data->etiqueta=mb_strtoupper($request->input('etiqueta'));
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
        return redirect('/admin/PoseePension/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $PoosePensionDi=PenDiferenciada::find($id);
        $PoosePensionDi->delete();
        return redirect('/admin/PoseePension/');
    }

    public function restaurar($id)
    {
        $datos=PenDiferenciada::onlyTrashed()->find($id)->restore();
        return redirect('/admin/PoseePension/');
    }
}
