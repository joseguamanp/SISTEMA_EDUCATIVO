<?php

namespace App\Http\Controllers;

use App\Paralelo;
use App\ParaleloAcad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ParaleloAcadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('acad_paralelos')
            ->join('sene_paraleloid', 'sene_paraleloid.id', '=', 'acad_paralelos.id_homologacion_sene')
            ->select('acad_paralelos.*','sene_paraleloid.etiqueta')
            ->get();
        $getdatos = $this->getdatos();
        //dd($data);exit();
        return view('admin.paraleloAcad.index',['data' =>$data,'getdatos' => $getdatos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getdatos=$this->getdatos();
        return view('admin.paraleloAcad.index',['getdatos' =>$getdatos]);
    }

    public function getId(){
        $id = ParaleloAcad::whereRaw('id > ? or deleted_at <> null', [0])->get();
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
        return $getdatos=array('Paralelo' =>Paralelo::all(),
            'decision'=>$decision);
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
        ParaleloAcad::create ([
            'id' => $this->getId(),
            'nombre_paralelo'=> mb_strtoupper($request->input('nombre_paralelo')),
            'abreviatura'=> mb_strtoupper($request->input('abreviatura')),
            'id_homologacion_sene'=>$request->input('id_homologacion_sene'),
            'observacion'=> strtoupper($request->input('observacion')),
            'id_usu_cre' => $id,
            'id_usu_mod' => $id,
        ]);
        return redirect('/admin/paraleloAcad/');
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
        $getdatos=$this->getdatos();
        $data = ParaleloAcad::find($id);
        return view('admin.paraleloAcad.edit', ["data"=>$data, 'getdatos' =>$getdatos]);
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
        $data=ParaleloAcad::find($id);
        $data->nombre_paralelo=mb_strtoupper($request->input('nombre_paralelo'));
        $data->abreviatura=mb_strtoupper($request->input('abreviatura'));
        $data->id_homologacion_sene=$request->input('id_homologacion_sene');
        $data->observacion=$request->input('observacion');
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
        return redirect('/admin/paraleloAcad/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paraleloacad=ParaleloAcad::find($id);
        $paraleloacad->delete();
        return redirect('/admin/paraleloAcad/');
    }

    public function restaurar($id)
    {
        $datos=ParaleloAcad::onlyTrashed()->find($id)->restore();
        return redirect('/admin/paraleloAcad/');
    }
}
