<?php

namespace App\Http\Controllers\admin\mant_academico;

use Illuminate\Http\Request;
use App\nivelFormacion;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\nivelFormacionRequest;

class nivelFormacionController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $data = nivelFormacion::withTrashed()->get();
    return view('admin.nivelFormacion.index',['data' =>$data] );
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

  public function getId(){

    $id = nivelFormacion::withTrashed()->get();
    $next = count($id);
    if($next > 0){
      $next+=1;
    } else {
      $next =1;
    }
    return $next;
  }

  public function store(nivelFormacionRequest $request)
  {
    $id_user = Auth::user()->id;

    nivelFormacion::create ([
      'id' => $this->getId(),
      'nombre'=> mb_strtoupper($request->input('nombre'), 'UTF-8'),
      'id_usu_cre' => $id_user,
      'id_usu_mod' => $id_user,
    ]);

    return redirect('admin/nivelFormacion');
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
    $data = nivelFormacion::find($id);
    return view('admin.nivelFormacion.edit', ["data"=>$data]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(nivelFormacionRequest $request, $id)
  {
    $data=nivelFormacion::find($id);
    $data->nombre=  mb_strtoupper($request->input('nombre'),'UTF-8');
    $data->id_usu_mod = Auth::user()->id;
    $data->save();
    return redirect('/admin/nivelFormacion/');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $JornadaCarrera=nivelFormacion::find($id);
    $JornadaCarrera->delete();
    return redirect('/admin/nivelFormacion/');
  }

  public function restaurar($id)
  {
    $datos=nivelFormacion::onlyTrashed()->find($id)->restore();
    return redirect('/admin/nivelFormacion/');
  }
}
