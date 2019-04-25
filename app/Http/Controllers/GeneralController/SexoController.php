<?php

namespace App\Http\Controllers\GeneralController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\GeneralModel\SexoModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SexoRequest;

class SexoController extends Controller
{
  /**
  * [__construct description]
  */
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('admin');
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $datos = SexoModel::withTrashed()->get();
    return view('admin.listasenescyt.datosidentificacion.createsexo',['datos'=>$datos]);
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
  * [store description]
  * @param  SexoRequest $request [description]
  * @return [type]               [description]
  */
  public function store(SexoRequest $request)
  {
    $next=SexoModel::withTrashed()->max('id');
    if($next == 0) $next = 1;
    else $next = $next + 1;
    $valor=strtoupper($request->input('etiqueta'));
    $this->validar($valor,$next);
    return $this->index();
  }

  /**
  * [validar description]
  * @param  [type] $valor  [description]
  * @param  [type] $contar [description]
  * @return [type]         [description]
  */
  public function validar($valor,$contar)
  {
    //$id_user=Auth::user()->id;
    $base=SexoModel::create([
      'id'=>$contar,
      'id_usu_cre' => Auth::user()->id,
      'etiqueta'=>$valor,
    ]);
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
    $datosid = SexoModel::find($id);
    return view('admin.listasenescyt.datosidentificacion.editsexo',['editaret'=>$datosid]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(SexoRequest $request, $id)
  {
    $datoset = SexoModel::find($id);
    $datoset->etiqueta = strtoupper($request->input('etiqueta'));
    $datoset->id_usu_mod = Auth::user()->id;
    $datoset->save();
    return redirect('/admin/sexo/');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $datoset=SexoModel::find($id);
    $datoset->id_usu_mod = Auth::user()->id;
    $datoset->save();
    $datoset->delete();
    return redirect('/admin/sexo/');
  }

  /**
  * [restaurar description]
  * @param  [type] $id [description]
  * @return [type]     [description]
  */
  public function restaurar($id)
  {
    $datos=SexoModel::onlyTrashed()->find($id)->restore();
    $datoset=SexoModel::find($id);
    $datoset->id_usu_mod = Auth::user()->id;
    $datoset->save();
    return redirect('/admin/sexo/');
  }
}
