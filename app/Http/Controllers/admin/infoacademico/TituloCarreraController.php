<?php

namespace App\Http\Controllers\admin\infoacademico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TituloCarrera;
use Illuminate\Support\Facades\Auth;

class TituloCarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TituloCarrera::withTrashed()->get();
        return view('admin.titulocarrera.index',['data' =>$data] );
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
        $id = TituloCarrera::withTrashed()->get();
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
        $dato = TituloCarrera::create ([
            'id' => $this->getId(),
            'etiqueta'=> mb_strtoupper($request->input('etiqueta')),
            'id_usu_cre' => $id,
            'id_usu_mod' => $id,
        ]);
        return redirect("admin/titulocarrera");
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
        $data = TituloCarrera::find($id);
        return view('admin.titulocarrera.edit', ["data"=>$data]);
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
        $data=TituloCarrera::find($id);
        $data->etiqueta= strtoupper($request->input('etiqueta'));
        $data->id_usu_mod=Auth::user()->id;
        $data->save();
        return redirect('/admin/titulocarrera/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $EstudianteOcupacion=TituloCarrera::find($id);
        $EstudianteOcupacion->delete();
        return redirect('/admin/titulocarrera/');
    }

    public function restaurar($id)
    {
        $datos=TituloCarrera::onlyTrashed()->find($id)->restore();
        return redirect('/admin/titulocarrera/');
    }
}
