<?php

namespace App\Http\Controllers;

use App\CargoDirectivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CargoDireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargo = CargoDirectivo::withTrashed()->get();
        return view('admin.docente.cargo.index',['data' => $cargo]);
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

    public function getId(){
        $id = CargoDirectivo::whereRaw('id > ? or deleted_at <> null',[0])->get();
        $next = count($id);
        if ($next > 0 ){
            $next+=1;
        }else
            $next = 1;
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
        $data = CargoDirectivo::create([
            'id' => $this->getId(),
            'etiqueta' => strtoupper($request->input('etiqueta')),
            'id_usu_cre' => Auth::user()->id,
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
        $data = CargoDirectivo::find($id);
        return view('admin.docente.cargo.edit',['data' => $data]);
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
        $data = CargoDirectivo::find($id);
        $data->etiqueta = strtoupper($request->input('etiqueta'));
        $data->id_usu_mod = Auth::user()->id;
        $data->save();

        return redirect('/admin/docentes/cargoDir');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = CargoDirectivo::find($id);
        $data->delete();
        return redirect('/admin/docentes/cargoDir');
    }

    public function restaurar($id){
        $data = CargoDirectivo::onlyTrashed()->find($id)->restore();
        return redirect('/admin/docentes/cargoDir');
    }
}
