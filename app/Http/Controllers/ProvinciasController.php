<?php

namespace App\Http\Controllers;
use App\Http\Requests\PaisesRequest;
use App\Provincias;
use App\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProvinciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = Pais::withTrashed()->get();
        $data = $this->getDatos();
        return view('admin.provincias.index', ['data' =>$data] );
    }

    public function getDatos()
    {
        return $datos = array('provincias'=>Provincias::withTrashed()->get(),
                              'paises'=>Pais::all());
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
        $id = Provincias::whereRaw('id > ? or deleted_at <> null', [0])->get();
         $next = count($id);
        if($next > 0 ){
            $next+=1;
        }else
            $next =1;
        return $next;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $dato = Provincias::create ([
            'id' => $this->getId(),
            'etiqueta'=> mb_strtoupper($request->input('etiqueta')),
            'id_pais' => $request->input('id_pais_sene'),
            'id_usu_cre' => Auth::user()->id,
        ]);
        return redirect('/admin/provincias/');
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
        $data = Provincias::find($id);
        $pais = Pais::all();
        return view('admin.provincias.edit', ["data"=>$data,"pais"=>$pais]);
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
        $data=Provincias::find($id);
        $data->etiqueta=$request->input('etiqueta');
        $data->id_pais=$request->input('id_pais');
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
        return redirect('/admin/provincias/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $provincias=Provincias::find($id);
        $provincias->delete();
        return redirect('/admin/provincias/');
    }

    public function restaurar($id)
    {
         $datos=Provincias::onlyTrashed()->find($id)->restore();
        return redirect('/admin/provincias/');
    }
}
