<?php
//modificado por andrea alvarado
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipoSangre;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TipoSangreRequest;
class tipoSangreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tipoSangre::withTrashed()->get();
        return view('admin.tipoSangre.index',['data' =>$data] );
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
        $id = tipoSangre::withTrashed()->get();
        $next = count($id);
        if($next > 0){
            $next+=1;
        }else
            $next =1;
        return $next;
    }
    public function store(TipoSangreRequest $request)
    {
            $id_usu_cre = Auth::user()->id;
            $id = $this->getId();
            $dato = tipoSangre::create ([
            'id' => $id,
            'etiqueta'=> mb_strtoupper($request->input('etiqueta'),'UTF-8'),
            'id_usu_cre' => $id_usu_cre,
            'id_usu_mod' => $id_usu_cre,    
            ]);

        return redirect('admin/tipoSangre');
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
        $data = tipoSangre::find($id);
        return view('admin.tipoSangre.edit', ["data"=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoSangreRequest $request, $id)
    {
        
        
        $data=tipoSangre::find($id);
        $data->etiqueta= mb_strtoupper($request->input('etiqueta'), 'UTF-8') ;
        $data->id_usu_mod= Auth::user()->id;
        $data->save();
        return redirect('/admin/tipoSangre/');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vinculacionSociedad=tipoSangre::find($id);
        $vinculacionSociedad->delete();
        return redirect('/admin/tipoSangre/');
    }
    
     public function restaurar($id)
    {
        $datos=tipoSangre::onlyTrashed()->find($id)->restore();
        return redirect('/admin/tipoSangre/');
    }
}