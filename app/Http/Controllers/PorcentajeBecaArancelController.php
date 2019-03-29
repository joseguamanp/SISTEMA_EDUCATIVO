<?php

namespace App\Http\Controllers;

use App\PorcentajeBecaArancel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PorcentajeBecaArancelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PorcentajeBecaArancel::withTrashed()->get();
        return view('admin.porcentajeBecaArancel.index',['data' =>$data] );
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


    public  function calcularId(){

        $registros = PorcentajeBecaArancel::All();

        $max_valor = count($registros);


        if($max_valor > 0){

            $max_valor++;

        } else {

            $max_valor = 1;
        }

        return $max_valor;

    }


    public function store(Request $request)
    {
        $id = $this->calcularId();
       
        $valor = $request->input('valor');
        $id_usu_cre = Auth::user()->id;

        porcentajeBecaArancel::create([

            'id' => $id, 
            'porcentaje' => $valor,
            'id_usu_cre' => $id_usu_cre,

        ]);

        return redirect('admin/porcentajebecaarancel');
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
        $data = PorcentajeBecaArancel::find($id);
        return view('admin.porcentajeBecaArancel.edit', ["data"=>$data]);
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
        $data=PorcentajeBecaArancel::find($id);
        $data->porcentaje= $request->input('valor');
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
        return redirect('/admin/porcentajebecaarancel/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $porcentaje=PorcentajeBecaArancel::find($id);
        $porcentaje->delete();
        return redirect('/admin/porcentajebecaarancel/'); //
    }

    public function restaurar($id)
    {
        $datos=PorcentajeBecaArancel::onlyTrashed()->find($id)->restore();
        return redirect('/admin/porcentajebecaarancel/');
    }
}
