<?php
//modificado por andrea alvarado
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\discapacidad;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DiscapacidadRequest;

class discapacidadcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = discapacidad::withTrashed()->get();
        return view('admin.discapacidad.index',['data' =>$data] );
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
        $id = discapacidad::withTrashed()->get();
        $next = count($id);
        if($next > 0){
            $next+=1;
        }else
            $next =1;
        return $next;
    }
    public function store(DiscapacidadRequest $request)
    {
            $id_usu_cre = Auth::user()->id;
            $id = $this->getId();
            discapacidad::create ([
            'id' => $id,
    'etiqueta'=> mb_strtoupper($request->input('etiqueta'),'UTF-8'),
            'id_usu_cre' => $id_usu_cre,
            'id_usu_mod' => $id_usu_cre,
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
        $data = discapacidad::find($id);
        return view('admin.discapacidad.edit', ["data"=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiscapacidadRequest $request, $id)
    {
        $data=discapacidad::find($id);
        $data->etiqueta= mb_strtoupper($request->input('etiqueta'), 'UTF-8') ;
        $data->id_usu_mod= Auth::user()->id;
        $data->save();
        return redirect('/admin/discapacidad/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vinculacionSociedad=discapacidad::find($id);
        $vinculacionSociedad->delete();
         return redirect('/admin/discapacidad/');
    }

    public function restaurar($id)
    {
        $datos=discapacidad::onlyTrashed()->find($id)->restore();
        return redirect('/admin/discapacidad/');
    }
}