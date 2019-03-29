<?php

namespace App\Http\Controllers\admin\mant_academico;

use App\Ciclos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CiclosController extends Controller
{
    public function index()
    {
        $data = Ciclos::withTrashed()->get();
        return view('admin.ciclos.index',['data' =>$data] );
    }
    public function create()
    {
        //
    }

    public function getId(){
        $id = Ciclos::whereRaw('id > ? or deleted_at <> null', [0])->get();
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
            $dato = Ciclos::create ([
            'id' =>$this->getId(),
            'nombre_ciclo'=> mb_strtoupper($request->input('nombre')),
            'nombre_corto'=> mb_strtoupper($request->input('nombre_corto')),
            'id_usu_cre' => $id,
            'id_usu_mod' => $id,
        ]);
        return redirect('/admin/ciclos/');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $data = Ciclos::find($id);
        return view('admin.ciclos.edit', ["data"=>$data]);
    }
    public function update(Request $request, $id)
    {
        $data=Ciclos::find($id);
        $data->nombre=mb_strtoupper($request->input('nombre'));
        $data->id_usu_mod=Auth::user()->id;
        $data->save();
        return redirect('/admin/ciclos');
    }

    public function destroy($id)
    {
        $Ciclo=Ciclos::find($id);
        $Ciclo->delete();
        return redirect('/admin/ciclos/');
    }

    public function restaurar($id)
    {
        $data = Ciclos::onlyTrashed()->find($id)->restore();
        return redirect('/admin/ciclos/');
    }
}
