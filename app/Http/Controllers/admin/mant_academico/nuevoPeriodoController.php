<?php

namespace App\Http\Controllers\admin\mant_academico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\AcadParaleloPeriodo;
use App\ParaleloAcad;
use App\Carreras;
use App\JornadaCar;
use App\AcadSedes;
use App\acad_periodos;
use App\ParaleloSeneJornadaCarreraModel;

//Nuevo periodo

class nuevoPeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodos = $this->consultarNuevoPeriodo();                     
        $periodoAnterior = $this->consultarPeriodoAnterior();        
        return view('admin.NuevoPeriodo.index',['periodos' => $periodos, 'periodoAnterior' => $periodoAnterior]); 
    }

    public function consultarNuevoPeriodo(){                
        return $resultado = DB::table('acad_periodos')   
                                ->select('acad_periodos.*')                                                                
                                ->whereNotExists(function($query){
                                    $query->select('acad_paralelos_x_periodo.*')
                                        ->from('acad_paralelos_x_periodo')
                                        ->whereRaw('acad_paralelos_x_periodo.id_periodo=acad_periodos.id');
                                })->get();               
    }
    public function consultarPeriodoAnterior(){                
        return  $resultado = DB::table('acad_periodos')   
                                ->select('acad_periodos.id', 'acad_periodos.nombre_periodo')    
                                ->join('acad_paralelos_x_periodo','acad_paralelos_x_periodo.id_periodo','=','acad_periodos.id')
                                ->groupBy('acad_periodos.id', 'acad_periodos.nombre_periodo')
                                ->get();                     
    }

    public function mostrarRegistroPeriodo(Request $request){
        $periodoNuevo = $request->periodoNuevo;
        return  $resultado = DB::table('acad_paralelos_x_periodo')   
                                ->select('acad_paralelos_x_periodo.id as id',
                                     'acad_carrera.nombreCarrera as carrera',
                                     'acad_sedes.nombre_sede as sede',
                                     'sene_jornadacarrera.etiqueta as jornada',
                                     'acad_paralelos.nombre_paralelo as paralelo')
                                ->join('acad_paralelos_sede_jornada_carrera','acad_paralelos_sede_jornada_carrera.id','=','acad_paralelos_x_periodo.id_para_sede_jor_car')
                                ->join('acad_sedes','acad_sedes.id','=', 'acad_paralelos_sede_jornada_carrera.id_sede')    
                                ->join('sene_jornadacarrera','sene_jornadacarrera.id','=', 'acad_paralelos_sede_jornada_carrera.id_jornada')
                                ->join('acad_paralelos','acad_paralelos.id','=','acad_paralelos_sede_jornada_carrera.id_paralelo')
                                ->join('acad_carrera','acad_carrera.id','=', 'acad_paralelos_sede_jornada_carrera.id_carrera')                   
                                ->join('acad_periodos','acad_periodos.id','=','acad_paralelos_x_periodo.id_periodo')
                                ->where('acad_periodos.id','=',$periodoNuevo)
                                ->get();   
    }

    public function consultarRegistrosPeriodos(Request $request){
        $id_periodoAnterior = $request->periodoAnterior;
        return  $resultado = DB::table('acad_paralelos_x_periodo')   
                                ->select('acad_paralelos_sede_jornada_carrera.id as id',
                                     'acad_carrera.nombreCarrera as carrera',
                                     'acad_sedes.nombre_sede as sede',
                                     'sene_jornadacarrera.etiqueta as jornada',
                                     'acad_paralelos.nombre_paralelo as paralelo')
                                ->join('acad_paralelos_sede_jornada_carrera','acad_paralelos_sede_jornada_carrera.id','=','acad_paralelos_x_periodo.id_para_sede_jor_car')
                                ->join('acad_sedes','acad_sedes.id','=', 'acad_paralelos_sede_jornada_carrera.id_sede')    
                                ->join('sene_jornadacarrera','sene_jornadacarrera.id','=', 'acad_paralelos_sede_jornada_carrera.id_jornada')
                                ->join('acad_paralelos','acad_paralelos.id','=','acad_paralelos_sede_jornada_carrera.id_paralelo')
                                ->join('acad_carrera','acad_carrera.id','=', 'acad_paralelos_sede_jornada_carrera.id_carrera')                   
                                ->join('acad_periodos','acad_periodos.id','=','acad_paralelos_x_periodo.id_periodo')
                                ->where('acad_periodos.id',$id_periodoAnterior)
                                ->get();
    }

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
    public function getId(){
        $next = AcadParaleloPeriodo::withTrashed()->max('id');
        if($next == 0)
            $next = 1;
        else
            $next = $next + 1;
        return $next;
    }
    public function store(Request $request)
    {
        $nuevoPeriodo = $request->id_nuevoPeriodo;
        $chkperiodo=$request->chkperiodo;
        $id_usu_cre = Auth::user()->id;    
        $array = explode(",", $chkperiodo);        
        foreach ($array as $chkp) {
            $id = $this->getId();
           AcadParaleloPeriodo::create([
                'id'=>$id,
                'id_para_sede_jor_car'=>$chkp,
                'id_periodo'=>$nuevoPeriodo,                
                'id_usu_cre'=>$id_usu_cre,                
            ]);           
        } 
        return json_encode('registrado');
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
        //
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
        //        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $data=AcadParaleloPeriodo::find($id);            
        $data->delete();
        return response()->json(["mensaje eliminado"]);        
    }
    public function restaurar($id)
    {
        $datos=AcadParaleloPeriodo::onlyTrashed()->find($id)->restore();        
        $datos->save();
         return response()->json(["mensaje restaurar"]);
    }
}
