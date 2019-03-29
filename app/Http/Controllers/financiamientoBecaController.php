<?php

namespace App\Http\Controllers;

use App\FinanciamientoBeca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class financiamientoBecaController extends Controller
{
    public function index()
    {
        $data = FinanciamientoBeca::withTrashed()->get();
        return view('admin.financiamientobeca.index',['data'=>$data]);
    }

    public function getId(){
        $id = FinanciamientoBeca::whereRaw('id > ? or deleted_at <> null', [0])->get();
        $next = count($id);
        if($next > 0 ){
            $next+=1;
        }else
            $next =1;
        return $next;
    }
//FinanciamientoBeca
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $dato = FinanciamientoBeca::create ([
            'id' => $this->getId(),
            'etiqueta'=> mb_strtoupper($request->input('etiqueta')),
            'id_usu_cre' => $id,
            'id_usu_mod' => $id,
        ]);
        return redirect('/admin/financiamientobeca/');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = FinanciamientoBeca::find($id);
        return view('admin.financiamientobeca.edit', ["data"=>$data]);
    }

    public function update(Request $request, $id)
    {
        $data=FinanciamientoBeca::find($id);
        $data->etiqueta=mb_strtoupper($request->input('etiqueta'));
        $data->id_usu_mod=Auth::user()->id;
        $data->save();
        return redirect('/admin/financiamientobeca/');
    }
    public function destroy($id)
    {
        $finanBeca=FinanciamientoBeca::find($id);
        $finanBeca->delete();
        return redirect('/admin/financiamientobeca/');
    }
    public function restaurar($id)
    {
        $datos=FinanciamientoBeca::onlyTrashed()->find($id)->restore();
        return redirect('/admin/financiamientobeca/');
    }
}
