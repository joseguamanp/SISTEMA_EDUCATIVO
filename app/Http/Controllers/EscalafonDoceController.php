<?php

namespace App\Http\Controllers;

use App\EscalafonDocente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EscalafonDoceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escalafon = EscalafonDocente::withTrashed()->get();
        return view('admin.docente.escalafon.index',['data'=>$escalafon]);
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
        $id = EscalafonDocente::whereRaw('id > ? or deleted_at <> null',[0])->get();
        $next = count($id);
        if ($next > 0 ){
            $next+=1;
        }else
            $next = 1;
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
        $data = EscalafonDocente::create([
            'id' => $this->getId(),
            'etiqueta' => strtoupper($request->input('etiqueta')),
            'id_usu_cre' => Auth::user()->id,
        ]);
        return redirect('/admin/docentes/escalafon');
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
        $data = EscalafonDocente::find($id);
        return view ('admin.docente.escalafon.edit',['data'=>$data]);
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
        $data = EscalafonDocente::find($id);
        $data->etiqueta = strtoupper($request->input('etiqueta'));
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
        return redirect('/admin/docentes/escalafon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = EscalafonDocente::find($id);
        $data->delete();
        return redirect('/admin/docentes/escalafon');
    }

    public function restaurar($id){
        $data = EscalafonDocente::onlyTrashed()->find($id)->restore();
        return redirect('/admin/docentes/escalafon');
    }
}
