<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AcadPeriodos;
use App\Ciclos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AcadPeriodosController extends Controller
{
    public function index()
    {
        $query = "select acad_periodos.id,date_format(acad_periodos.fecha_inicio_clases,'%d/%m/%Y') as fecha_inicio_clases,date_format(acad_periodos.fecha_fin_clases,'%d/%m/%Y') as fecha_fin_clases, ".
                 "date_format(acad_periodos.fecha_inicio_matricula_ord,'%d/%m/%Y') as fecha_inicio_matricula_ord,date_format(acad_periodos.fecha_fin_matricula_ord,'%d/%m/%Y') as fecha_fin_matricula_ord, ".
                 "date_format(acad_periodos.fecha_inicio_matricula_ext,'%d/%m/%Y') as fecha_inicio_matricula_ext,date_format(acad_periodos.fecha_fin_matricula_ext,'%d/%m/%Y') as fecha_fin_matricula_ext, ".
                 "date_format(acad_periodos.fecha_inicio_matricula_esp,'%d/%m/%Y') as fecha_inicio_matricula_esp,date_format(acad_periodos.fecha_fin_matricula_esp,'%d/%m/%Y') as fecha_fin_matricula_esp, ".
                 "acad_ciclos.nombre_ciclo,acad_periodos.nombre_periodo,acad_periodos.nombre_corto,acad_periodos.anio_periodo,acad_periodos.fecha_cre,acad_periodos.fecha_mod,acad_periodos.deleted_at ".
                 "from acad_periodos ".
                 "inner join acad_ciclos on acad_ciclos.id = acad_periodos.id_ciclo";
        $getdats = $this->getdatos();
        $data = DB::select($query);
        //dd($data);exit();
        return view('admin.AcadPeriodos.index',['data' =>$data,'getdato' => $getdats]);
    }
    public function create()
    {
        $getdatos=$this->getdatos();
        return view('admin.AcadPeriodos.index',['getdatos' =>$getdatos]);
    }
    public function getId(){
        $id = AcadPeriodos::whereRaw('id > ? or deleted_at <> null', [0])->get();
        $next = count($id);
        if($next > 0 ){
            $next+=1;
        }else
            $next =1;
        return $next;
    }
    
    public function getdatos()
    {
        $decision=array('SI','NO');
        return $getdato=array('id_ciclo' =>Ciclos::all(),
            'decision'=>$decision);
    }
   
    public function store(Request $request)
    {
        //dd($request->all());exit();
            $id_usu_cre = Auth::user()->id;
            $id = $this->getId();
            $dato = AcadPeriodos::create ([
            'id' => $id,
            'nombre_periodo'=>$request->input('etiqueta'),
            'nombre_corto'=>$request->input('nombrecorto'),
            'anio_periodo'=>$request->input('añoperiodo'),
            'id_usu_cre' => $id_usu_cre,
            'id_usu_mod' => $id_usu_cre,
            'id_ciclo'=>$request->input('id_ciclo'),
            'fecha_inicio_clases' => $request->input('fechaini'),
            'fecha_fin_clases'  => $request->input('fechafin'),
            'fecha_inicio_matricula_ord'  => $request->input('fechainima'),
            'fecha_fin_matricula_ord'  => $request->input('fechafinma'),
            'fecha_inicio_matricula_ext'  => $request->input('fechainiext'),
            'fecha_fin_matricula_ext'  => $request->input('fechafinext'),
            'fecha_inicio_matricula_esp'  => $request->input('fechainiesp'),
            'fecha_fin_matricula_esp'  => $request->input('fechafinesp'),
                
        ]);

        return redirect('/admin/AcadPeriodos');
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
        $data = AcadPeriodos::find($id);
        $getdato= $this->getdatos();
        return view('admin.AcadPeriodos.edit', ["data"=>$data, "getdato"=>$getdato]);
        
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
        $data=AcadPeriodos::find($id);
        $data->nombre_periodo=$request->input('nombre_periodo');
        $data->nombre_corto=$request->input('nombre_corto');
        $data->año_periodo=$request->input('año_periodo');
        $data->id_ciclo=$request->input('id_ciclo');
        $data->fecha_inicio_clases=$request->input('fechaini');
        $data->fecha_fin_clases =$request->input('fechafin');
        $data->fecha_inicio_matricula_ord=$request->input('fechainima');
        $data->fecha_fin_matricula_ord=$request->input('fechafinma');
        $data->fecha_inicio_matricula_ext=$request->input('fechainiext');
        $data->fecha_fin_matricula_ext=$request->input('fechafinext');
        $data->fecha_inicio_matricula_esp=$request->input('fechainiesp');
        $data->fecha_fin_matricula_esp=$request->input('fechafinesp');
        $data->save();
        return redirect('/admin/AcadPeriodos/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vinculacionSociedad=AcadPeriodos::find($id);
        $vinculacionSociedad->delete();
        return redirect('/admin/AcadPeriodos/');
    }
    
    public function restaurar($id)
    {
        $datos=AcadPeriodos::onlyTrashed()->find($id)->restore();
        return redirect('/admin/AcadPeriodos/');
    }
}
