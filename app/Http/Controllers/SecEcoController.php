<?php

namespace App\Http\Controllers;

use App\SectorEconomico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecEcoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SectorEconomico::withTrashed()->get();   
        return view('admin.sectorEcon.index',['data' => $data]);
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

    public function getId()
    {
        $id = SectorEconomico::whereRaw('id > ? or deleted_at <> null', [0])->get();
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
        $dato = SectorEconomico::create([
            'id' => $this->getId(),
            'etiqueta' => mb_strtoupper($request->input('etiqueta')),
            'id_usu_cre' => Auth::user()->id,
        ]);
        return redirect('/admin/sectorEcon/');
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
        $data = SectorEconomico::find($id);
        return view('admin.sectorEcon.edit', ["data"=>$data]);
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
        $data = SectorEconomico::find($id);
        $data->etiqueta=mb_strtoupper($request->input('etiqueta'));
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
        return redirect('/admin/sectorEcon/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $secEco=SectorEconomico::find($id);
        $secEco->delete();
        return redirect('/admin/sectorEcon/');
    }


     public function restaurar($id)
    {
         $datos=SectorEconomico::onlyTrashed()->find($id)->restore();
        return redirect('/admin/sectorEcon/');
    }
}
