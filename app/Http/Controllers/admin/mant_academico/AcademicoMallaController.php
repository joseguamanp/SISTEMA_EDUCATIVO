<?php

namespace App\Http\Controllers\admin\mant_academico;

use App\AcademicoMalla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\AcademicoMallaRequest;

class AcademicoMallaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data  =  AcademicoMalla::All();
        return view('admin.academicoMalla.index',['data' => $data] );
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
    public  function calcularId(){

        $registros = AcademicoMalla::All();
        $max_valor = count($registros);

        if($max_valor > 0){
            $max_valor++;
        } else {
            $max_valor = 1;
        }
        return $max_valor;
    }

    public function store(AcademicoMallaRequest $request)
    {
        $id = $this->calcularId();
        $nombre_malla = mb_strtoupper($request->input('nombre_malla'),'UTF-8');
        $nombre_corto = mb_strtoupper($request->input('nombre_corto'),'UTF-8');
        $num_sem_per_aca = $request->input('num_sem_per_aca');
        $id_usu_cre = Auth::user()->id;

        AcademicoMalla::create([

            'id' => $id,
            'nombre_malla' => $nombre_malla,
            'nombre_corto' => $nombre_corto,
            'num_sem_per_aca' => $num_sem_per_aca,
            'id_usu_cre' => $id_usu_cre,
            'id_usu_mod' => $id_usu_cre,

        ]);

        return redirect('admin/malla');
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
        $data = AcademicoMalla::find($id);
        return view('admin.academicoMalla.edit', ["data" => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AcademicoMallaRequest $request, $id)
    {
        $data = AcademicoMalla::find($id);
        $data->nombre_malla = mb_strtoupper($request->input('nombre_malla'),'UTF-8');
        $data->nombre_corto = mb_strtoupper($request->input('nombre_corto'),'UTF-8');
        $data->num_sem_per_aca = $request->input('num_sem_per_aca');
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
        return redirect('/admin/malla/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro=AcademicoMalla::where('id',$id);
        $registro->delete();
        return redirect('/admin/malla');
    }

    /*{
        $datos=AcademicoMalla::onlyTrashed()->find($id)->restore();
        return redirect('/admin/malla/');
    }*/
}
