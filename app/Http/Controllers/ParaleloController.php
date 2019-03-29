<?php

namespace App\Http\Controllers;

use App\Paralelo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ParaleloRequest;
class ParaleloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Paralelo::withTrashed()->get();
        return view('admin.paralelo.index',['data' =>$data] );
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
        $id = Paralelo::whereRaw('id > ? or deleted_at <> null', [0])->get();
        $next = count($id);
        if($next > 0 ){
            $next+=1;
        }else
            $next =1;
        return $next;
    }

    public function store(ParaleloRequest $request)
    {
        $id=Auth::user()->id;
        $dato = Paralelo::create ([
            'id' => $this->getId(),
            'etiqueta'=> mb_strtoupper($request->input('etiqueta')),
            'id_usu_cre' => $id,
            'id_usu_mod' => $id,
        ]);
        return redirect('/admin/paralelo');
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
        $data = Paralelo::find($id);
        return view('admin.paralelo.edit', ["data"=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParaleloRequest $request, $id)
    {
        $data=Paralelo::find($id);
        $data->etiqueta=mb_strtoupper($request->input('etiqueta'));
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
        return redirect('/admin/paralelo/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paralelo=Paralelo::find($id);
        $paralelo->delete();
        return redirect('/admin/paralelo/');
    }

    public function restaurar($id)
    {
        $datos=Paralelo::onlyTrashed()->find($id)->restore();
        return redirect('/admin/paralelo/');
    }
}
