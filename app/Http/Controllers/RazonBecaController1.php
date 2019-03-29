<?php

namespace App\Http\Controllers;

use App\RazonBeca1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RazonBecaController1 extends Controller
{

    public function index()
    {
        $data = RazonBeca1::withTrashed()->get();
        return view('admin.razon1.index', ['data' =>$data] );
    }


    public function getId(){
        $id = RazonBeca1::whereRaw('id > ? or deleted_at <> null', [0])->get();
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
        $dato = RazonBeca1::create ([
            'id' => $this->getId(),
            'etiqueta'=> mb_strtoupper($request->input('etiqueta')),
            'id_usu_cre' => $id,
            'id_usu_mod' => $id,
        ]);
        return redirect('/admin/razon1/');
    }

    public function edit($id)
    {
        $data = RazonBeca1::find($id);
        return view('admin.razon1.edit', ["data"=>$data]);
    }

    public function update(Request $request, $id)
    {
        $data=RazonBeca1::find($id);
        $data->etiqueta=mb_strtoupper($request->input('etiqueta'));
        $data->id_usu_mod=Auth::user()->id;
        $data->save();
        return redirect('/admin/razon1/');
    }

    public function destroy($id)
    {
        $Razon1=RazonBeca1::find($id);
        $Razon1->delete();
        return redirect('/admin/razon1/');
    }

    public function restaurar($id){
        $datos=RazonBeca1::onlyTrashed()->find($id)->restore();
        return redirect('/admin/razon1/');
    }
}
