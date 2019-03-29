<?php

namespace App\Http\Controllers\admin\mant_academico;

use App\Carreras;
use App\ModalidadCar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\CarrerasRequest;

class CarrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Carreras::withTrashed()->get();
        $moda = ModalidadCar::All();
        return view('admin.carreras.index', ['data' =>$data], ['moda' => $moda]);
    }

    public function getId(){
        $id = Carreras::whereRaw('id > ? or deleted_at <> null',[0])->get();
        //echo count($id); exit();
        $next = count($id);
        if($next > 0){
            $next = $next + 1;
        }else {
            return 1;
        }
        //echo $next; exit();
        return $next;
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
    public function store(CarrerasRequest $request)
    {
        //dd($request->input('cmbMod'));       
        $dato = Carreras::create([
            'id' => $this->getId(),
            'nombreCarrera' => mb_strtoupper($request->input('nombreCarrera'),'UTF-8'),
            'id_modalidad' => $request->input('modCarrera'),
            'id_usu_cre' => Auth::user()->id,
            //'id_modalidad' => strtoupper($request->input('cmbMod')),
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
        $moda = ModalidadCar::All();
        $data = Carreras::find($id);
        return view('admin.carreras.edit',["data" => $data,"moda"=>$moda]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarrerasRequest $request, $id)
    {
        $data = Carreras::find($id);
        $data->nombreCarrera=mb_strtoupper($request->input('nombreCarrera'),'UTF-8');
        $data->id_modalidad = $request->input('modCarrera');
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
        return redirect('/admin/carreras/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car=Carreras::find($id);
        $car->delete();
        return redirect('/admin/carreras/');
    }

    public function restaurar($id){
        $datos=Carreras::onlyTrashed()->find($id)->restore();
        return redirect('/admin/carreras/');
    }
}
