<?php

namespace App\Http\Controllers;

use App\RelacionLaboralIess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RelacionLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relacion = RelacionLaboralIess::withTrashed()->get();
        return view('admin.docente.relacionLab.index',['data'=>$relacion]);
    }

    public function getId(){
        $id = RelacionLaboralIess::whereRaw('id > ? or deleted_at <> null',[0])->get();
        $next = count($id);
        if ($next > 0 ){
            $next+=1;
        }else
            $next = 1;
        return $next;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = RelacionLaboralIess::create([
            'id' => $this->getId(),
            'etiqueta' => strtoupper($request->input('etiqueta')),
            'id_usu_cre' => Auth::user()->id,
       ]);

        return redirect('/admin/docentes/relacionLab');
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
        $data = RelacionLaboralIess::find($id);
        return view ('admin.docente.relacionLab.edit',['data'=>$data]);
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
        $data = RelacionLaboralIess::find($id);
        $data->etiqueta = strtoupper($request->input('etiqueta'));
        $data->id_usu_mod = Auth::user()->id;
        $data->save();

        return redirect('/admin/docentes/relacionLab');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $relacion = RelacionLaboralIess::find($id);
        $relacion->delete();

        return redirect('/admin/docentes/relacionLab');
    }

    public function restaurar($id)
    {
        $datos=RelacionLaboralIess::onlyTrashed()->find($id)->restore();
        return redirect('/admin/docentes/relacionLab/');
    }
}
