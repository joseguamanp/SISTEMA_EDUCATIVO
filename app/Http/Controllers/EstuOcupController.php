<?php

namespace App\Http\Controllers;

use App\EstuOcup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstuOcupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = EstuOcup::withTrashed()->get();
        return view('admin.estuOcup.index',['data' =>$data] );
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
        $id = EstuOcup::whereRaw('id > ? or deleted_at <> null', [0])->get();
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
        $dato = EstuOcup::create ([
            'id' => $this->getId(),
            'etiqueta'=> mb_strtoupper($request->input('etiqueta')),
            'id_usu_cre' => $id,
            'id_usu_mod' => $id,
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
        $data = EstuOcup::find($id);
        return view('admin.estuOcup.edit', ["data"=>$data]);
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
        $data=EstuOcup::find($id);
        $data->nombre=mb_strtoupper($request->input('etiqueta'));
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
        return redirect('/admin/estuOcup/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $EstudianteOcupacion=EstuOcup::find($id);
        $EstudianteOcupacion->delete();
        return redirect('/admin/estuOcup/');
    }

    public function restaurar($id)
    {
        $datos=EstuOcup::onlyTrashed()->find($id)->restore();
        return redirect('/admin/estuOcup/');
    }
}
