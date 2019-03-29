<?php

namespace App\Http\Controllers;
use App\Http\Requests\PaisesRequest;
use Illuminate\Http\Request;
use App\Pais;
use Illuminate\Support\Facades\Auth;
class PaisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Pais::withTrashed()->get();
        //$data = Pais::All();
        return view('admin.paises.index', ['data' =>$data] );
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
        $id = Pais::all();
        $next = count($id);
        if ($next > 0 ){
            $next+=1;
        }else
            $next = 1;
        return $next;
    }

    public function store(PaisesRequest $request)
    {
        $id=Auth::user()->id;
        $dato = Pais::create ([
            'id' => $this->getId(),
            'etiqueta'=> mb_strtoupper($request->input('etiqueta')),
            'id_usu_cre' => $id
        ]);
        return redirect('/admin/paises/');
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
        $data = Pais::find($id);
        return view('admin.paises.edit', ["data"=>$data]);
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
        $data=Pais::find($id);
        $data->etiqueta=$request->input('etiqueta');
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
        return redirect('/admin/paises/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paises=Pais::find($id);
        $paises->delete();
        return redirect('/admin/paises/');
    }

    public function restaurar($id)
    {
        $datos=Pais::onlyTrashed()->find($id)->restore();
        return redirect('/admin/paises/');
    }
}
