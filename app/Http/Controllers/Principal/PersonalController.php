<?php

namespace App\Http\Controllers\Principal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Principal\PersonalModel;
class PersonalController extends Controller
{
    public function __construct()
    {
        
    }
    public function index()
    {
    	$fecha=$this->fecha();
      	return view('admin.mante_principal.registro.index',['fecha'=>$fecha]);
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
    public function store(OpcionRequest $request)
    {

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
