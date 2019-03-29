<?php

namespace App\Http\Controllers;

use App\Cantones;
use App\Provincias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CantonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->getDatos();
        return view('admin.cantones.index', ['data' => $data]);
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

    public function getDatos()
    {
        return $datos = array('cantones'=>Cantones::withTrashed()->get(),
                              'provincias'=>Provincias::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

      public function getId(){
        $id = Cantones::whereRaw('id > ? or deleted_at <> null', [0])->get();
         $next = count($id);
        if($next > 0 ){
            $next+=1;
        }else
            $next =1;
        return $next;
    }

    public function store(Request $request)
    {
        $dato = Cantones::create([
           'id' => $this->getId(),
           'etiqueta' => mb_strtoupper($request->input('etiqueta')),
           'id_provincia' => $request->input('id_provincias'),
           'id_usu_cre' => Auth::user()->id,
        ]);
        return redirect('/admin/cantones/');
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
        $data = Cantones::find($id);
        $provincias = Provincias::all();
        return view('admin.cantones.edit', ["data"=>$data,"provincias"=>$provincias]);
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
        $data = Cantones::find($id);
        $data->etiqueta=$request->input('etiqueta');
        $data->id_provincia = $request->input('id_provincia');
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
        return redirect('/admin/cantones/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cantones=Cantones::find($id);
        $cantones->delete();
        return redirect('/admin/cantones/');    
    }

     public function restaurar($id)
    {
         $datos=Cantones::onlyTrashed()->find($id)->restore();
        return redirect('/admin/cantones/');
    }
}
