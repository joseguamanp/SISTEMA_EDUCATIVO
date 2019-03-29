<?php

namespace App\Http\Controllers;

use App\TipoBeca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TipoBecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TipoBeca::withTrashed()->get();
        return view('admin.tipobeca.index', ['data' =>$data] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getId(){
        $id = TipoBeca::whereRaw('id > ? or deleted_at <> null', [0])->get();
        $next = count($id);
        if($next > 0 ){
            $next+=1;
        }else
            $next =1;
        return $next;
    }
    public function store(Request $request)
    {
        $id=Auth::user()->id;
        $dato = TipoBeca::create ([
            'id' => $this->getId(),
            'etiqueta'=> mb_strtoupper($request->input('etiqueta')),
            'id_usu_cre' => $id,
            'id_usu_mod' => $id,
        ]);
        return redirect('/admin/tipobeca/');
    }

    public function edit($id)
    {
        $data = TipoBeca::find($id);
        return view('admin.tipobeca.edit', ["data"=>$data]);
    }

    public function update(Request $request, $id)
    {
        $data=TipoBeca::find($id);
        $data->etiqueta=mb_strtoupper($request->input('etiqueta'));
        $data->id_usu_mod=Auth::user()->id;
        $data->save();
        return redirect('/admin/tipobeca/');
    }


    public function destroy($id)
    {
        $beca1=TipoBeca::find($id);
        $beca1->delete();
        return redirect('/admin/tipobeca/');
    }

    public function restaurar($id){
        $data = TipoBeca::onlyTrashed()->find($id)->restore();
        return redirect('/admin/tipobeca/');
    }
}
