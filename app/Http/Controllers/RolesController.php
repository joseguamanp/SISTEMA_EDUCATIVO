<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RolRequest;
use App\Rol;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('admin');
    }
    public function index()
    {
        $rol=Rol::withTrashed()->get();
        return view('admin.rol.create',['rol'=>$rol]);
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
    public function store(RolRequest $request)
    {
        Rol::create([
            'nombre'=>strtoupper($request->input('nombre')),
            'estado'=>'A'
        ]);
        $rol=Rol::All();
        return redirect('admin/rol');
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
        $rol = Rol::find($id);
        return view('admin.rol.edit', ["rol"=>$rol]);

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
        $rol = Rol::find($id);
        $rol->nombre=strtoupper($request->input('nombre'));
        $rol->save();
        $rol=Rol::All();
        return redirect('/admin/rol');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rol=rol::find($id);
        $rol->delete();
         return redirect('/admin/rol');  
    }
    public function restaurar($id)
    {
        $datos=rol::onlyTrashed()->find($id)->restore();
        return redirect('/admin/rol');
    }
}
