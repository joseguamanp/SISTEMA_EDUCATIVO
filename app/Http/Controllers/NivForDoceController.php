<?php

namespace App\Http\Controllers;

use App\NivForDoce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NivForDoceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $nivel = NivForDoce::withTrashed()->get();
        return view('admin.docente.nivel.index',['data'=>$nivel]);
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
        $id = NivForDoce::whereRaw('id > ? or deleted_at <> null',[0])->get();
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
        $dato = NivForDoce::create([
            'id' => $this->getId(),
            'etiqueta' => strtoupper($request->input('etiqueta')),
            'id_usu_cre' => Auth::user()->id,
        ]);

        return redirect('/admin/docentes/nivel');
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
        $data = NivForDoce::find($id);
        return view('admin.docente.nivel.edit',['data'=>$data]);
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
        $data = NivForDoce::find($id);
        $data->etiqueta = $request->input('etiqueta');
        $data->id_usu_mod = Auth::user()->id;
        $data->save();

        return redirect('/admin/docentes/nivel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nivel=NivForDoce::find($id);
        $nivel->delete();
        return redirect('/admin/docentes/nivel/');
    }

    public function restaurar($id)
    {
        $datos=NivForDoce::onlyTrashed()->find($id)->restore();
        return redirect('/admin/docentes/nivel/');
    }
}
