<?php

namespace App\Http\Controllers;
use App\AlcanceProyectoVinculacion;
use Illuminate\Http\Request;
use App\Http\Requests\AlcanceProyectoRequest;
use Illuminate\Support\Facades\Auth;

class AlcanceProyectoVinculacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AlcanceProyectoVinculacion::withTrashed()->get();
        return view('admin.alcanceProyectoVinculacion.index',['data' =>$data] );
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

        $registros = AlcanceProyectoVinculacion::withTrashed()->get();
        $max_valor = count($registros);

        if($max_valor > 0){
            $max_valor++;
        } else {
            $max_valor = 1;
        }

        return $max_valor;
    }

    public function store(AlcanceProyectoRequest $request)
    {
        $id = $this->calcularId();
        $etiqueta = mb_strtoupper($request->input('etiqueta'),'UTF-8');
        $id_usu_cre = Auth::user()->id;
        AlcanceProyectoVinculacion::create([
            'id' => $id,
            'etiqueta' => $etiqueta,
            'id_usu_cre' => $id_usu_cre,
            'id_usu_mod' => $id_usu_cre,
        ]);
        return redirect('admin/alcanceproyecto');
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
        $data = AlcanceProyectoVinculacion::find($id);
        return view('admin.alcanceProyectoVinculacion.edit', ["data"=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlcanceProyectoRequest $request, $id)
    {
        $data=AlcanceProyectoVinculacion::find($id);
        $data->etiqueta=mb_strtoupper($request->input('etiqueta'),'UTF-8');
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
        return redirect('/admin/alcanceproyecto/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alcance=AlcanceProyectoVinculacion::find($id);
        $alcance->delete();
        return redirect('/admin/alcanceproyecto/');
    }

    public function restaurar($id)
    {
        $datos=AlcanceProyectoVinculacion::onlyTrashed()->find($id)->restore();
        return redirect('/admin/alcanceproyecto/');
    }
}
