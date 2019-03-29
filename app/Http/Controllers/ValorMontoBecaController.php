<?php

namespace App\Http\Controllers;
use App\ValorMontoBeca;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValorMontoBecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ValorMontoBeca::withTrashed()->get();
        return view('admin.valorMontoBeca.index',['data' =>$data] );
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

        $registros = ValorMontoBeca::All();

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

        ValorMontoBeca::create([

            'id' => $id, 
            'valor' => $valor,
            'id_usu_cre' => $id_usu_cre,

        ]);

        return redirect('admin/valormontobeca');
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
        $data = ValorMontoBeca::find($id);
        return view('admin.valorMontoBeca.edit', ["data"=>$data]);
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
        $data=ValorMontoBeca::find($id);
        $data->valor= $request->input('valor');
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
        return redirect('/admin/valormontobeca/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $valorMonto=ValorMontoBeca::find($id);
        $valorMonto->delete();
        return redirect('/admin/valormontobeca/');
    }

    public function restaurar($id)
    {
        $datos=ValorMontoBeca::onlyTrashed()->find($id)->restore();
        return redirect('/admin/valormontobeca/');
    }
}
