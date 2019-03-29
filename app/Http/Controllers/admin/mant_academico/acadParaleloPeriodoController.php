<?php

namespace App\Http\Controllers\admin\mant_academico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\AcadParaleloPeriodo;
use App\ParaleloAcad;
use App\Carreras;
use App\JornadaCar;
use App\AcadSedes;
use App\acad_periodos;
use App\ParaleloSeneJornadaCarreraModel;
use Illuminate\Support\Facades\DB;

class acadParaleloPeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {                
        $periodos = acad_periodos::All();
        $carreras = $this->obtenerCarrera();                    
  
        return view('admin.acadParaleloPeriodo.index',['periodos' => $periodos,
                                                       'carreras' => $carreras,]
        );        
    }

    public function obtenerCarrera(){
        return $carrera = DB::table('acad_carrera')
        ->select('acad_carrera.id','acad_carrera.nombreCarrera')
        ->join('acad_paralelos_sede_jornada_carrera','acad_paralelos_sede_jornada_carrera.id_carrera','=','acad_carrera.id')
        ->groupBy('acad_carrera.id','acad_carrera.nombreCarrera')->get();
    }
    public function ObtenerRegistros(Request $request){
                
        $id_periodo = $request->periodo;
        $id_carrera = $request->carrera;  
        return $resultado = DB::table('acad_carrera')
                 ->join('acad_paralelos_sede_jornada_carrera','acad_paralelos_sede_jornada_carrera.id_carrera', '=', 'acad_carrera.id')
                 ->join('acad_paralelos_x_periodo','acad_paralelos_x_periodo.id_para_sede_jor_car','=','acad_paralelos_sede_jornada_carrera.id')
                 ->join('acad_periodos', function($join) use($id_periodo){
                            $join->on('acad_paralelos_x_periodo.id_periodo', '=', 
                                      'acad_periodos.id')
                            ->where('acad_paralelos_x_periodo.id_periodo', '=', $id_periodo);
                        })                 
                 ->join('acad_sedes',
                               'acad_sedes.id','=', 
                               'acad_paralelos_sede_jornada_carrera.id_sede')
                        ->join('sene_jornadacarrera',
                               'sene_jornadacarrera.id','=', 
                               'acad_paralelos_sede_jornada_carrera.id_jornada')
                        ->join('acad_paralelos',
                               'acad_paralelos.id','=','acad_paralelos_sede_jornada_carrera.id_paralelo')
                 ->where('acad_carrera.id', $id_carrera)
                 ->select('acad_paralelos_x_periodo.id as id',
                                 'acad_carrera.nombreCarrera as carrera',
                                 'acad_sedes.nombre_sede as sede',
                                 'sene_jornadacarrera.etiqueta as jornada',
                                 'acad_paralelos.nombre_paralelo as paralelo',
                                    'acad_periodos.nombre_periodo as periodo',
                                    'acad_paralelos_x_periodo.deleted_at')
                 ->get();

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


    public function nuevoRegistro(Request $request){        
        $id_periodo = $request->periodo;
        $id_carrera = $request->carrera;  
        return  $resultado = DB::table('acad_paralelos_sede_jornada_carrera')   
                                ->select('acad_paralelos_sede_jornada_carrera.id as id',
                                     'acad_carrera.nombreCarrera as carrera',
                                     'acad_sedes.nombre_sede as sede',
                                     'sene_jornadacarrera.etiqueta as jornada',
                                     'acad_paralelos.nombre_paralelo as paralelo')
                                ->join('acad_sedes','acad_sedes.id','=', 'acad_paralelos_sede_jornada_carrera.id_sede')    
                                ->join('sene_jornadacarrera','sene_jornadacarrera.id','=', 'acad_paralelos_sede_jornada_carrera.id_jornada')
                                ->join('acad_paralelos','acad_paralelos.id','=','acad_paralelos_sede_jornada_carrera.id_paralelo')
                                ->join('acad_carrera','acad_carrera.id','=', 'acad_paralelos_sede_jornada_carrera.id_carrera')
                                ->where('acad_carrera.id',$id_carrera)                                
                                ->whereNotExists(function($query){
                                    $query->select('acad_paralelos_x_periodo.id')
                                        ->from('acad_paralelos_x_periodo')
                                        ->whereRaw('acad_paralelos_x_periodo.id_para_sede_jor_car=acad_paralelos_sede_jornada_carrera.id');
                                })->get();                     
    }

    public function store(Request $request)
    {
        $next = AcadParaleloPeriodo::max('id');
        $id_periodo = $request->periodo;
        $id_psjc = $request->psjc;        
        $id_usu_cre = Auth::user()->id;        
        if($next == 0)
            $next = 1;
        else
            $next = $next + 1;
        AcadParaleloPeriodo::create ([
            'id' => $next,
            'id_para_sede_jor_car'=>$id_psjc,
            'id_periodo'=>$id_periodo,            
            'id_usu_cre'=>$id_usu_cre,
        ]);
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
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
        $data->delete();
        return response()->json(["mensaje eliminado"]);        
    }
    public function restaurar($id)
    {
        $datos=AcadParaleloPeriodo::onlyTrashed()->find($id)->restore();
        $data=AcadParaleloPeriodo::find($id);
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
         return response()->json(["mensaje restaurar"]);
    }
}
