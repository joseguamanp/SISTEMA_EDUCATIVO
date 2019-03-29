<?php

namespace App\Http\Controllers\admin\mant_academico;
use App\acad_periodos;
use App\Ciclos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class Acad_PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciclo=Ciclos::all();
        $data = acad_periodos::withTrashed()->get();
        return view('admin.acad_periodos.create',['data' =>$data,'ciclo'=>$ciclo] );
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
    public function id_valor()
    {
        $valor=acad_periodos::withTrashed()->get();
        $contar=count($valor);
        if ($contar < 0) {
            $contar =1;
        }else{
            $contar++;
        }
        return $contar;
    }
    public function store(Request $request)
    {
        $nombre_periodo=strtoupper($request->input('nombre_periodo'));
        $anio_periodo=strtoupper($request->input('anio_periodo'));
        $nombre_corto=strtoupper($request->input('nombrecorto'));
        $id_usu_cre =Auth::user()->id;
        $dato = acad_periodos::create ([
            'id'=>$this->id_valor(),
            'nombre_periodo'=> $nombre_periodo,
            'anio_periodo'=>$anio_periodo,
            'nombre_corto'=>$nombre_corto,
            'id_ciclo'=>$request->input('id_ciclo'),
            'id_usu_cre'=> $id_usu_cre,
        ]);

        return redirect('admin/periodo');
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
        $ciclo=Ciclos::all();
        $data = acad_periodos::find($id);
        return view('admin.acad_periodos.edit', ['data'=>$data,'ciclo'=>$ciclo]);
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
        $data=acad_periodos::find($id);
        $data->etiqueta=$request->input('etiqueta');
        $data->save();
        return redirect('/admin/periodo/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vinculacionSociedad=acad_periodos::find($id);
        $vinculacionSociedad->delete();
         return redirect('/admin/periodo/');
    }

    public function restaurar($id)
    {
        $datos=acad_periodos::onlyTrashed()->find($id)->restore();
        return redirect('/admin/periodo/');
    }
}
