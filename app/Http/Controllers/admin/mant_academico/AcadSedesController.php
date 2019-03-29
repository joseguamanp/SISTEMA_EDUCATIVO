<?php

namespace App\Http\Controllers\admin\mant_academico;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AcadSedes;
use App\Provincias;
use App\Cantones;


class AcadSedesController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $data = $this->getData();
    $sedes = AcadSedes::withTrashed()->get();
    return view('admin.acadSedes.index', ['data' => $data, 'sedes' => $sedes]);
  }

  public function getData(){

    return $array = array(
      'provincias' => Provincias::All(),
      'cantones' => Cantones::All(),
    );

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
    $next = AcadSedes::max('id');
    $nombre_sede = mb_strtoupper($request->input('nombre_sede'), 'UTF-8') ;
    $id_provincia = $request->input('id_provincia');
    $id_canton = $request->input('id_canton');
    $observacion = $request->input('observacion');
    $id_usu = Auth::user()->id;    
    if($next == 0)
        $next = 1;
    else
        $next = $next + 1;
    $dato = AcadSedes::create([

      'id' => $next,
      'nombre_sede' => $nombre_sede,
      'id_provincia' => $id_provincia,
      'id_canton' => $id_canton,
      'observacion' => $observacion,
      'id_usu_cre' => $id_usu,      

    ]);

    return redirect('admin/academicoSedes');
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
    $data = AcadSedes::find($id);
    $provincias = Provincias::All();
    $cantones = Cantones::All();

    return view('admin.acadSedes.edit', ['data' => $data,
    'provincias' => $provincias,
    'cantones' => $cantones]);

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
    $data = AcadSedes::find($id);
    $data->nombre_sede = $request->input('nombre_sede');
    $data->id_provincia = $request->input('id_provincia');
    $data->id_canton = $request->input('id_canton');
    $data->observacion = $request->input('observacion');
    $data->id_usu_mod = Auth::user()->id;
    $data->save();

    return redirect('/admin/academicoSedes/');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $data = AcadSedes::find($id);
    $data->id_usu_mod = Auth::user()->id;
    $data->save();
    $data->delete();
    return redirect('/admin/academicoSedes');
  }

  public function restaurar($id){
    $data = AcadSedes::onlyTrashed()->find($id)->restore();
    $data=AcadSedes::find($id);
    $data->id_usu_mod = Auth::user()->id;
    $data->save();
    return redirect('/admin/academicoSedes');
  }

}
