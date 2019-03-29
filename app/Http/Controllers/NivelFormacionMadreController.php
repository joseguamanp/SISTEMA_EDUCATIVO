<?php

namespace App\Http\Controllers;
use App\NivelFormacionMadre;
use App\Http\Requests\NivelFormacionMadreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NivelFormacionMadreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = NivelFormacionMadre::withTrashed()->get();
        return view('admin.nivelFormacionMadre.index', ['data' =>$data] );
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

        $registros = NivelFormacionMadre::withTrashed()->get();
        $max_valor = count($registros);

        if($max_valor > 0){
            $max_valor++;
        } else {
            $max_valor = 1;
        }

        return $max_valor;
    }

    public function store(NivelFormacionMadreRequest $request)
    {
        $id = $this->calcularId();
        $etiqueta = mb_strtoupper($request->input('etiqueta'),'UTF-8');
        $id_usu_cre = Auth::user()->id;

        NivelFormacionMadre::create([
            'id' => $id,
            'etiqueta' => $etiqueta,
            'id_usu_cre' => $id_usu_cre,
            'id_usu_mod' => $id_usu_cre,
        ]);

        return redirect('admin/formacionmadre');
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
        $data = NivelFormacionMadre::find($id);
        return view('admin.nivelFormacionMadre.edit', ["data"=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NivelFormacionMadreRequest $request, $id)
    {
        $data=NivelFormacionMadre::find($id);
        $data->etiqueta=  mb_strtoupper($request->input('etiqueta'),'UTF-8');
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
        return redirect('/admin/formacionmadre/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nivelFormacion=NivelFormacionMadre::find($id);
        $nivelFormacion->delete();
        return redirect('/admin/formacionmadre/');
    }

    public function restaurar($id)
    {
        $datos=NivelFormacionMadre::onlyTrashed()->find($id)->restore();
        return redirect('/admin/formacionmadre/');
    }

}
