<?php

namespace App\Http\Controllers\GeneralController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\GeneralModel\SexoModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SexoRequest;

class SexoController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('admin');
  }

  public function index()
  {
    $datos = SexoModel::withTrashed()->paginate(5);
    return view('admin.listasenescyt.datosidentificacion.createsexo',['datos'=>$datos]);
  }

  public function store(SexoRequest $request)
  {
    $next=SexoModel::withTrashed()->max('id');
    if($next == 0) $next = 1;
    else $next = $next + 1;
    $valor = mb_strtoupper($request->input('etiqueta'), 'UTF-8');
    $id_user = Auth::user()->id;
    SexoModel::create([
      'id'=> $next,
      'id_usu_cre' => $id_user,
      'id_usu_mod' => $id_user,
      'etiqueta' => $valor,
    ]);
    return response()->json(["guardado"]);
  }

  public function show(Request $request)
  {
    $limit = $request->input('limit');
    $offset = $request->input('offset');
    $search = $request->input('search');
    $order = $request->input('order');
    if($order == "true"){
      if($search == "") $datos = SexoModel::withTrashed()->limit($limit)->offset($offset)->orderBy('etiqueta', 'ASC')->get();
      else $datos = SexoModel::withTrashed()->where('etiqueta','like','%'.$search.'%')->limit($limit)->offset($offset)->orderBy('etiqueta', 'ASC')->get();
    }else{
      if($search == "") $datos = SexoModel::withTrashed()->limit($limit)->offset($offset)->get();
      else $datos = SexoModel::withTrashed()->where('etiqueta','like','%'.$search.'%')->limit($limit)->offset($offset)->get();
    }

    return response()->json(
      $datos->toArray()
    );
  }

  function count(Request $request)
  {
    $search = $request->input('search');
    if($search == "") $count = SexoModel::withTrashed()->count();
    else $count = SexoModel::withTrashed()->where('etiqueta','like','%'.$search.'%')->count();
    return json_encode($count);
  }

  public function edit($id)
  {
    $datosid = SexoModel::find($id);
    return response()->json(
      $datosid->toArray()
    );
  }

  public function update(SexoRequest $request, $id)
  {
    $datoset = SexoModel::find($id);
    $datoset->etiqueta = mb_strtoupper($request->input('etiqueta'),'UTF-8');
    $datoset->id_usu_mod = Auth::user()->id;
    $datoset->save();
    return response()->json(["modificado"]);
  }

  public function destroy($id)
  {
    $datoset=SexoModel::find($id);
    $datoset->id_usu_mod = Auth::user()->id;
    $datoset->delete();
    return json_encode($datoset);
  }

  public function restaurar($id)
  {
    $datos=SexoModel::onlyTrashed()->find($id)->restore();
    $datoset=SexoModel::find($id);
    $datoset->id_usu_mod = Auth::user()->id;
    $datoset->save();
    return json_encode($datoset);
  }
}
