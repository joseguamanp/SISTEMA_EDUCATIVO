<?php

namespace App\Http\Controllers\Principal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Principal\PersonalModel;
use App\Model\CargoModel;

class PersonalController extends Controller
{
    public function __construct()
    {
        
    }
    public function index()
    {
    	$fecha=$this->fecha();
        $cargo=CargoModel::all();
      	return view('admin.mante_principal.registro.index',['fecha'=>$fecha,'cargo'=>$cargo]);
    }
    public function data()
    {
    	$data = array('cargo' => 'Rector' );
    }
    public function fecha()
    {
    	$anios=array();
	    for($i = date("Y"); $i >= date("Y") - 100; $i--){
	        array_push($anios,$i);
	    }
	    $dias=array();
	    for($j= 1; $j <= 31; $j++){
	        array_push($dias,$j);
	    }
	    $meses=array(1=>'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
    	$fecha = array('dia' => $dias,
    	 					'mes' =>$meses,
    	 					'anio'=>$anios);
    	//dd($fecha);
    	return $fecha;
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
        $pri_nombre=$request->input("pri_nombre");
        $seg_nombre=$request->input("seg_nombre");
        $pri_apellido=$request->input("pri_apellido");
        $seg_apellido=$request->input("seg_apellido");
        $cedula=$request->input("cedula");
        $telefono=$request->input("telefono");
        $email=$request->input("email");
        $dias=$request->input("dias");
        $mes=$request->input("mes");
        $anio=$request->input("anio");
        $cargo=$request->input("idcargo");
        $imagen=$request->file('imagen'); 
        $nombre=$imagen->getClientOriginalName();
        $data=PersonalModel::create([
              'nombre_primero'=>mb_strtoupper($pri_nombre, 'UTF-8'),
              'nombre_segundo'=>mb_strtoupper($seg_nombre, 'UTF-8'),   
              'apellido_primero'=>mb_strtoupper($pri_apellido, 'UTF-8'),
              'apellido_segundo'=>mb_strtoupper($seg_apellido, 'UTF-8'), 
              'foto'=>$nombre,
              'cedula'=>$cedula,
              //'telefono'=>,
              'email'=>$email,
              'cargo_id'=>$cargo
              //'fecha_nacimiento'=>
        ]);
        \Storage::disk('local')->put($nombre,\File::get($imagen));
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
     public function restaurar($id)
    {
        
    }

}
