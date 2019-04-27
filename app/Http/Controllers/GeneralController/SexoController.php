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
    $datos = SexoModel::withTrashed()->get();
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

  public function show()
  {
    $datos = SexoModel::withTrashed()->get();
    return json_encode($datos);
  }

  public function edit($id)
  {
    $datosid = SexoModel::find($id);
    return view('admin.listasenescyt.datosidentificacion.editsexo',['editaret'=>$datosid]);
  }

  public function update(SexoRequest $request, $id)
  {
    $datoset = SexoModel::find($id);
    $datoset->etiqueta = strtoupper($request->input('etiqueta'));
    $datoset->id_usu_mod = Auth::user()->id;
    $datoset->save();
    return redirect('/admin/sexo/');
  }

  public function destroy(Request $request)
  {
    $datoset=SexoModel::find($request->input('id'));
    $datoset->id_usu_mod = Auth::user()->id;
    $datoset->save();
    $datoset->delete();
    return response()->json(["desactivado"]);
  }

  public function restaurar($id)
  {
    $datos=SexoModel::onlyTrashed()->find($id)->restore();
    $datoset=SexoModel::find($id);
    $datoset->id_usu_mod = Auth::user()->id;
    $datoset->save();
    return redirect('/admin/sexo/');
  }
}
