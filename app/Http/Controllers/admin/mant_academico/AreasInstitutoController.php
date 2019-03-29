<?php

namespace App\Http\Controllers\admin\mant_academico;

use App\AreasInstituto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AreasInstitutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AreasInstituto::withTrashed()->get();
        return view('admin.areasInstituto.index',['data' =>$data] );
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
    public function getId(){
        $id = AreasInstituto::whereRaw('id > ? or deleted_at <> null', [0])->get();
        $next = count($id);
        if($next > 0 ){
            $next+=1;
        }else
            $next =1;
        return $next;
    }

    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $dato = AreasInstituto::create ([
            'id' => $this->getId(),
            'nombre'=> mb_strtoupper($request->input('nombre')),
            'id_usu_cre' => $id,
            'id_usu_mod' => $id,
        ]);
        return redirect('/admin/areasInstituto');
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
        $data = AreasInstituto::find($id);
        return view('admin.areasInstituto.edit', ["data"=>$data]);
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
        $data=AreasInstituto::find($id);
        $data->nombre=mb_strtoupper($request->input('nombre'));
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
        return redirect('/admin/areasInstituto/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $JornadaCarrera=AreasInstituto::find($id);
        $JornadaCarrera->delete();
        return redirect('/admin/areasInstituto/');
    }

    public function restaurar($id)
    {
        $datos=AreasInstituto::onlyTrashed()->find($id)->restore();
        return redirect('/admin/areasInstituto/');
    }
}
