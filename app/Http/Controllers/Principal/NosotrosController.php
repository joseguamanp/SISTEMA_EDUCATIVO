<?php

namespace App\Http\Controllers\Principal;

use App\Model\Principal\NosotrosModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NosotrosController extends Controller
{
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
    $datos = NosotrosModel::withTrashed()->get();
    return view('admin.mante_principal.nosotros.create_nosotros',['datos'=>$datos]);
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
  public function store(Request $request)
  {
    $id = $this->obtenerId();
    $titulo = mb_strtoupper($request->input('titulo'), 'UTF-8');
    $descripcion = $request->input('descripcion');
    $id_user = Auth::user()->id;
    NosotrosModel::create([
      'id'=> $id,
      'titulo' => $titulo,
      'descripcion' => $descripcion,
      'id_prin_nosotros' => $id,
      'id_usu_cre' => $id_user,
      'id_usu_mod' => $id_user,
    ]);
    return response()->json(["guardado"]);
  }

  /**
   * [obtenerId description]
   * @return [type] [description]
   */
  public function obtenerId(){
    $next=NosotrosModel::withTrashed()->max('id');
    if($next == 0) $next = 1;
    else $next = $next + 1;
    return $next;
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Model\Principal\NosotrosModel  $nosotrosModel
  * @return \Illuminate\Http\Response
  */
  public function show()
  {
    $datos = NosotrosModel::withTrashed()->get();
    return response()->json(
      $datos->toArray()
    );
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Model\Principal\NosotrosModel  $nosotrosModel
  * @return \Illuminate\Http\Response
  */
  public function edit(NosotrosModel $nosotrosModel)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Model\Principal\NosotrosModel  $nosotrosModel
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    $datoset = NosotrosModel::find($id);
    $datoset->titulo = mb_strtoupper($request->input('titulo'),'UTF-8');
    $datoset->descripcion = $request->input('descripcion');
    $datoset->id_usu_mod = Auth::user()->id;
    $datoset->save();
    return response()->json(["modificado"]);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Model\Principal\NosotrosModel  $nosotrosModel
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $datoset=NosotrosModel::find($id);
    $datoset->id_usu_mod = Auth::user()->id;
    $datoset->delete();
    return json_encode($datoset);
  }

  public function restaurar($id)
  {
    $datos=NosotrosModel::onlyTrashed()->find($id)->restore();
    $datoset=NosotrosModel::find($id);
    $datoset->id_usu_mod = Auth::user()->id;
    $datoset->save();
    return json_encode($datoset);
  }
}
