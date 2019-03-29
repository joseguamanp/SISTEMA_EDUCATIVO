<?php

namespace App\Http\Controllers;

use App\CategoriaMigratoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaMigratoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CategoriaMigratoria::withTrashed()->get();
        return view('admin.categoriaMigratoria.index',['data' =>$data] );
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
    public function getId(){
        $id = CategoriaMigratoria::whereRaw('id > ? or deleted_at <> null', [0])->get();
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
        $data = CategoriaMigratoria::create ([
            'id' => $this->getId(),
            'etiqueta'=> mb_strtoupper($request->input('nombre')),
            'id_usu_cre' => $id,
        ]);
        return redirect('/admin/categoriaMigratoria');
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
        $data = CategoriaMigratoria::find($id);
        return view('admin.categoriaMigratoria.edit', ["data"=>$data]);
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
        $data=CategoriaMigratoria::find($id);
        $data->etiqueta= mb_strtoupper($request->input('etiqueta'));
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
        return redirect('/admin/categoriaMigratoria/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $CategoriaMigratoria=CategoriaMigratoria::find($id);
        $CategoriaMigratoria->delete();
        return redirect('/admin/categoriaMigratoria/');
    }

    public function restaurar($id)
    {
        $data = CategoriaMigratoria::onlyTrashed()->find($id)->restore();
        return redirect('/admin/categoriaMigratoria/');
    }
}
