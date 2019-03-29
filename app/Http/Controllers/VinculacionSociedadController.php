<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VinculacionSociedad;
use App\Http\Requests\VinculacionSociedadRequest;
use Illuminate\Support\Facades\Auth;

class VinculacionSociedadController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $data = VinculacionSociedad::withTrashed()->get();
    return view('admin.vinculacionSociedad.index',['data' =>$data] );
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

    $registros = VinculacionSociedad::withTrashed()->get();
    $max_valor = count($registros);

    if($max_valor > 0){
      $max_valor++;
    } else {
      $max_valor = 1;
    }

    return $max_valor;
  }


  public function store(VinculacionSociedadRequest $request)
  {
    $id = $this->calcularId();

    $etiqueta = mb_strtoupper($request->input('etiqueta'),'UTF-8');
    $id_usu_cre = Auth::user()->id;

    VinculacionSociedad::create([
      'id' => $id,
      'etiqueta' => $etiqueta,
      'id_usu_cre' => $id_usu_cre,
      'id_usu_mod' => $id_usu_cre,
    ]);

    return redirect('admin/vinculacionsociedad');
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
    $data = VinculacionSociedad::find($id);
    return view('admin.vinculacionSociedad.edit', ["data"=>$data]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(VinculacionSociedadRequest $request, $id)
  {
    $data=VinculacionSociedad::find($id);
    $data->etiqueta = strtoupper($request->input('etiqueta'));
    $data->id_usu_mod = Auth::user()->id;
    $data->save();
    return redirect('/admin/vinculacionsociedad/');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $vinculacionSociedad=VinculacionSociedad::find($id);
    $vinculacionSociedad->delete();
    return $this->index();
  }

  public function restaurar($id)
  {
    $datos=VinculacionSociedad::onlyTrashed()->find($id)->restore();
    return redirect('/admin/vinculacionsociedad/');
  }
}
