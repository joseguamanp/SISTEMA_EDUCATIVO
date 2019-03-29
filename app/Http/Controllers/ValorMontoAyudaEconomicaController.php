<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ValorMontoAyudaEconomica;
use App\Http\Requests\ValorMontoAyudaEconomicaRequest;

class ValorMontoAyudaEconomicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ValorMontoAyudaEconomica::withTrashed()->get();
        return view('admin.valorMontoAyudaEconomica.index', ['data' =>$data] );
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
    public function store(ValorMontoAyudaEconomicaRequest $request)
    {
        $id = ValorMontoAyudaEconomica::All();
        $next = count($id);
        if($next == 0)
            $next = 1;
        $dato = ValorMontoAyudaEconomica::create ([
            'id' => $next,
            'etiqueta'=> strtoupper($request->input('etiqueta')),
        ]);

        return $this->index();
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
        $data = ValorMontoAyudaEconomica::find($id);
        return view('admin.valorMontoAyudaEconomica.edit', ["data"=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValorMontoAyudaEconomicaRequest $request, $id)
    {
        $data=ValorMontoAyudaEconomica::find($id);
        $data->etiqueta=$request->input('etiqueta');
        $data->save();
        return redirect('/admin/valorAyudaEconomica/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alcance=ValorMontoAyudaEconomica::find($id);
        $alcance->delete();
        return redirect('/admin/valorAyudaEconomica/');
    }
    public function restaurar($id)
    {
        $datos=ValorMontoAyudaEconomica::onlyTrashed()->find($id)->restore();
        return redirect('/admin/valorAyudaEconomica/');
    }
}
