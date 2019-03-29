<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AcadMallasMateriasModel;
use App\ParaleloAcad;
use App\acad_periodos;
use App\AcademicoMalla;
use App\ParaleloSeneJornadaCarreraModel;
use App\MateriaXParalelo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MateriaXPeriodoController extends Controller
{
    public function index()
    {
        $getdatos=$this->getdatos();
        return view('admin.materiaxparalelo.index',['getdatos'=>$getdatos]);
    }
   public function getdatos()
    {
    	return $getdatos=array(
    				    'periodo'=>$this->periodotodo(),
                        'malla'=>$this->mallastodo()
                    );
    }
    public function sedes(Request $request)
    {
        $periodo=$request->input('id_periodo');
        $sede=$request->input('id_sede');
        $data=DB::table('acad_paralelos_x_periodo')->distinct()
            ->join('acad_periodos','acad_periodos.id','=','acad_paralelos_x_periodo.id_periodo')
            ->join('acad_paralelos_sede_jornada_carrera','acad_paralelos_sede_jornada_carrera.id','=','acad_paralelos_x_periodo.id_para_sede_jor_car')
            ->join('acad_sedes','acad_sedes.id','=','acad_paralelos_sede_jornada_carrera.id_sede')
            ->join('acad_carrera','acad_carrera.id','=','acad_paralelos_sede_jornada_carrera.id_carrera')
            ->join('sene_jornadacarrera','sene_jornadacarrera.id','=','acad_paralelos_sede_jornada_carrera.id_jornada')
            ->join('acad_paralelos','acad_paralelos.id','=','acad_paralelos_sede_jornada_carrera.id_paralelo')
            ->where('acad_paralelos_x_periodo.id_periodo','=',$periodo)
            ->when($sede, function ($query, $sede) {
                    return $query->where('acad_paralelos_sede_jornada_carrera.id_sede','=',$sede);
                })
            ->select('acad_sedes.*')->get();
        return response()->json(
            $data->toArray()
            );
    }
    public function carrera(Request $request)
    {
        $periodo=$request->input('id_periodo');
        $sede=$request->input('id_sede');
        $data=DB::table('acad_paralelos_x_periodo')->distinct()
            ->join('acad_periodos','acad_periodos.id','=','acad_paralelos_x_periodo.id_periodo')
            ->join('acad_paralelos_sede_jornada_carrera','acad_paralelos_sede_jornada_carrera.id','=','acad_paralelos_x_periodo.id_para_sede_jor_car')
            ->join('acad_sedes','acad_sedes.id','=','acad_paralelos_sede_jornada_carrera.id_sede')
            ->join('acad_carrera','acad_carrera.id','=','acad_paralelos_sede_jornada_carrera.id_carrera')
            ->join('sene_jornadacarrera','sene_jornadacarrera.id','=','acad_paralelos_sede_jornada_carrera.id_jornada')
            ->join('acad_paralelos','acad_paralelos.id','=','acad_paralelos_sede_jornada_carrera.id_paralelo')
            ->where('acad_paralelos_x_periodo.id_periodo','=',$periodo)
            ->when($sede, function ($query, $sede) {
                    return $query->where('acad_paralelos_sede_jornada_carrera.id_sede','=',$sede);
                })
            ->select('acad_carrera.*')->get();
        return response()->json(
            $data->toArray()
            );
    }
    public function jornada(Request $request)
    {
        $periodo=$request->input('id_periodo');
        $sede=$request->input('id_sede');
        $carrera=$request->input('id_carrera');
        $jornada=$request->input('id_jornada');
        $data=DB::table('acad_paralelos_x_periodo')->distinct()
            ->join('acad_periodos','acad_periodos.id','=','acad_paralelos_x_periodo.id_periodo')
            ->join('acad_paralelos_sede_jornada_carrera','acad_paralelos_sede_jornada_carrera.id','=','acad_paralelos_x_periodo.id_para_sede_jor_car')
            ->join('acad_sedes','acad_sedes.id','=','acad_paralelos_sede_jornada_carrera.id_sede')
            ->join('acad_carrera','acad_carrera.id','=','acad_paralelos_sede_jornada_carrera.id_carrera')
            ->join('sene_jornadacarrera','sene_jornadacarrera.id','=','acad_paralelos_sede_jornada_carrera.id_jornada')
            ->join('acad_paralelos','acad_paralelos.id','=','acad_paralelos_sede_jornada_carrera.id_paralelo')
            ->where('acad_paralelos_x_periodo.id_periodo','=',$periodo)
            ->when($sede, function ($query, $sede) {
                    $query->where('acad_paralelos_sede_jornada_carrera.id_sede','=',$sede);
                })
            ->where('acad_paralelos_sede_jornada_carrera.id_carrera','=',$carrera)
            ->select('sene_jornadacarrera.*')->get();
        return response()->json(
            $data->toArray()
            );
    }
    public function paralelo(Request $request)
    {
        $periodo=$request->input('id_periodo');
        $sede=$request->input('id_sede');
        $carrera=$request->input('id_carrera');
        $jornada=$request->input('id_jornada');
        $data=DB::table('acad_paralelos_x_periodo')->distinct()
            ->join('acad_periodos','acad_periodos.id','=','acad_paralelos_x_periodo.id_periodo')
            ->join('acad_paralelos_sede_jornada_carrera','acad_paralelos_sede_jornada_carrera.id','=','acad_paralelos_x_periodo.id_para_sede_jor_car')
            ->join('acad_sedes','acad_sedes.id','=','acad_paralelos_sede_jornada_carrera.id_sede')
            ->join('acad_carrera','acad_carrera.id','=','acad_paralelos_sede_jornada_carrera.id_carrera')
            ->join('sene_jornadacarrera','sene_jornadacarrera.id','=','acad_paralelos_sede_jornada_carrera.id_jornada')
            ->join('acad_paralelos','acad_paralelos.id','=','acad_paralelos_sede_jornada_carrera.id_paralelo')
            ->where('acad_paralelos_x_periodo.id_periodo','=',$periodo)
            ->when($sede, function ($query, $sede) {
                    $query->where('acad_paralelos_sede_jornada_carrera.id_sede','=',$sede);
                })
            ->where('acad_paralelos_sede_jornada_carrera.id_carrera','=',$carrera)
            ->when($jornada, function ($query, $jornada) {
                    $query->where('acad_paralelos_sede_jornada_carrera.id_jornada','=',$jornada);
                })
            ->select('acad_paralelos.*')->get();
        return response()->json(
            $data->toArray()
            );
    }
    public function mallas(Request $request)
    {
        $malla=$request->input("id_malla");
        $nivel=$request->input("id_nivel");
        $materia=$request->input("id_materia");
        $data=DB::table('acad_mallas_materias')->distinct()
                ->join('acad_mallas','acad_mallas.id','=','acad_mallas_materias.id_malla')
                ->join('acad_materias','acad_materias.id','=','acad_mallas_materias.id_materia')
                ->join('sene_nivelacademicocurso','sene_nivelacademicocurso.id','=','acad_mallas_materias.id_nivel')
                ->where('acad_mallas_materias.id_malla','=',$malla)
                ->select('sene_nivelacademicocurso.*')->get();
        return response()->json(
            $data->toArray()
            );
    }
    public function nivel(Request $request)
    {
        $malla=$request->input("id_malla");
        $nivel=$request->input("id_nivel");
        $materia=$request->input("id_materia");
        $data=DB::table('acad_mallas_materias')->distinct()
                ->join('acad_mallas','acad_mallas.id','=','acad_mallas_materias.id_malla')
                ->join('acad_materias','acad_materias.id','=','acad_mallas_materias.id_materia')
                ->join('sene_nivelacademicocurso','sene_nivelacademicocurso.id','=','acad_mallas_materias.id_nivel')
                ->where('acad_mallas_materias.id_malla','=',$malla)
                ->when($nivel, function ($query, $nivel) {
                    return $query->where('acad_mallas_materias.id_nivel','=',$nivel);
                })
                //->orWhere('acad_mallas_materias.id_nivel','=',$nivel)
                //->orWhere('acad_mallas_materias.id_materia','=',$materia)
                ->select('acad_materias.*')->get();
        return response()->json(
            $data->toArray()
            );
    }
    public function mallastodo()
    {
        return $data=DB::table('acad_mallas_materias')->distinct()
                ->join('acad_mallas','acad_mallas.id','=','acad_mallas_materias.id_malla')
                ->join('acad_materias','acad_materias.id','=','acad_mallas_materias.id_materia')
                ->join('sene_nivelacademicocurso','sene_nivelacademicocurso.id','=','acad_mallas_materias.id_nivel')
                ->select('acad_mallas.*')->get();
    }
    public function periodotodo()
    {
        return $data=DB::table('acad_paralelos_x_periodo')->distinct()
            ->join('acad_periodos','acad_periodos.id','=','acad_paralelos_x_periodo.id_periodo')
            ->join('acad_paralelos_sede_jornada_carrera','acad_paralelos_sede_jornada_carrera.id','=','acad_paralelos_x_periodo.id_para_sede_jor_car')
            ->join('acad_sedes','acad_sedes.id','=','acad_paralelos_sede_jornada_carrera.id_sede')
            ->join('acad_carrera','acad_carrera.id','=','acad_paralelos_sede_jornada_carrera.id_carrera')
            ->join('sene_jornadacarrera','sene_jornadacarrera.id','=','acad_paralelos_sede_jornada_carrera.id_jornada')
            ->join('acad_paralelos','acad_paralelos.id','=','acad_paralelos_sede_jornada_carrera.id_paralelo')
            ->select('acad_periodos.*')->get();
    }
    public function mostrar()
    {
        $data=DB::table('acad_materia_x_paralelo')
              ->join('acad_mallas_materias','acad_mallas_materias.id','=','acad_materia_x_paralelo.id_materia_malla')
              ->join('acad_paralelos_x_periodo','acad_paralelos_x_periodo.id','=','acad_materia_x_paralelo.id_paralelo_periodo')
              ->join('acad_mallas','acad_mallas.id','=','acad_mallas_materias.id_malla')
              ->join('acad_materias','acad_materias.id','=','acad_mallas_materias.id_materia')
              ->join('acad_paralelos_sede_jornada_carrera','acad_paralelos_sede_jornada_carrera.id','=','acad_paralelos_x_periodo.id_para_sede_jor_car')
              ->join('acad_paralelos','acad_paralelos.id','=','acad_paralelos_sede_jornada_carrera.id_paralelo')
              ->select('acad_materias.*','acad_paralelos.*','acad_mallas.*')->get();
        return response()->json(
            $data->toArray()
            );
    }
    public function mostrarfiltro(Request $request)
    {
        $periodo=$request->input('id_periodo');
        $malla=$request->input("id_malla");
        $data=DB::table('acad_materia_x_paralelo')->distinct()
            ->join('acad_paralelos_x_periodo','acad_paralelos_x_periodo.id','=','acad_materia_x_paralelo.id_paralelo_periodo')
            ->join('acad_mallas_materias','acad_mallas_materias.id','=','acad_materia_x_paralelo.id_materia_malla')
            ->join('acad_periodos','acad_periodos.id','=','acad_paralelos_x_periodo.id_periodo')
            ->join('acad_paralelos_sede_jornada_carrera','acad_paralelos_sede_jornada_carrera.id','=','acad_paralelos_x_periodo.id_para_sede_jor_car')
            ->join('acad_paralelos','acad_paralelos.id','=','acad_paralelos_sede_jornada_carrera.id_paralelo')
            ->join('acad_mallas','acad_mallas.id','=','acad_mallas_materias.id_malla')
            ->where('acad_paralelos_x_periodo.id_periodo','=',$periodo)
            ->when($malla, function ($query, $malla) {
                    return $query->where('acad_mallas_materias.id_malla','=',$malla);
                })
            ->select('acad_periodos.nombre_periodo','acad_mallas.nombre_malla','acad_paralelos.nombre_paralelo')->get();
        return response()->json(
            $data->toArray()
            );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    public function getId(){
        $id = MateriaXParalelo::all();
        $next = count($id);
        if($next > 0){
            $next+=1;
        }else
            $next =1;
        return $next;
    }
    public function store(Request $request)
    {
        $periodo=$request->input('id_periodo');
        $sede=$request->input('id_sede');
        $carrera=$request->input('id_carrera');
        $jornada=$request->input('id_jornada');
        $malla=$request->input("id_malla");
        $nivel=$request->input("id_nivel");
        $materia=$request->input("id_materia");
        $query1=DB::table('acad_paralelos_x_periodo')
            ->join('acad_periodos','acad_periodos.id','=','acad_paralelos_x_periodo.id_periodo')
            ->join('acad_paralelos_sede_jornada_carrera','acad_paralelos_sede_jornada_carrera.id','=','acad_paralelos_x_periodo.id_para_sede_jor_car')
            ->join('acad_sedes','acad_sedes.id','=','acad_paralelos_sede_jornada_carrera.id_sede')
            ->join('acad_carrera','acad_carrera.id','=','acad_paralelos_sede_jornada_carrera.id_carrera')
            ->join('sene_jornadacarrera','sene_jornadacarrera.id','=','acad_paralelos_sede_jornada_carrera.id_jornada')
            ->join('acad_paralelos','acad_paralelos.id','=','acad_paralelos_sede_jornada_carrera.id_paralelo')
            ->where('acad_paralelos_x_periodo.id_periodo','=',$periodo)
            ->when($sede, function ($query, $sede) {
                    return $query->where('acad_paralelos_sede_jornada_carrera.id_sede','=',$sede);
                })->select('acad_paralelos_x_periodo.id')->first();
            //->orWhere('acad_paralelos_sede_jornada_carrera.id_carrera','=',$carrera)
            //->orWhere('acad_paralelos_sede_jornada_carrera.id_jornada','=',$jornada)
            
        $query2=DB::table('acad_mallas_materias')
                ->join('acad_mallas','acad_mallas.id','=','acad_mallas_materias.id_malla')
                ->join('acad_materias','acad_materias.id','=','acad_mallas_materias.id_materia')
                ->join('sene_nivelacademicocurso','sene_nivelacademicocurso.id','=','acad_mallas_materias.id_nivel')
                ->where('acad_mallas_materias.id_malla','=',$malla)
                ->when($nivel, function ($query, $nivel) {
                    return $query->where('acad_mallas_materias.id_nivel','=',$nivel);
                })
                ->select('acad_mallas_materias.id')->first();
                //->orWhere('acad_mallas_materias.id_materia','=',$materia)
       //return  $query1;
       $id = $this->getId();
        MateriaXParalelo::create ([
            'id' => $id,
            'id_paralelo_periodo'=>$query1->id,
            'id_materia_malla'=>$query2->id
        ]);
       return response()->json("Datos registrados");
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
        $getdatos=$this->getdatos();
        $data = ParaleloSeneJornadaCarreraModel::find($id);
        return view('admin.pa_se_jor_car.edit', ["data"=>$data,'getdatos' =>$getdatos]);
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
        $data=ParaleloSeneJornadaCarreraModel::find($id);
        $data->id_carrera=$request->input('id_carrera');
        $data->id_sede=$request->input('id_sede');
        $data->id_jornada=$request->input('id_jornada');
        $data->id_paralelo=$request->input('id_paralelo');
        $data->save();
        return redirect('/admin/asignacion/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=ParaleloSeneJornadaCarreraModel::find($id);
        $data->delete();
        return response()->json(["mensaje eliminado"]);
    }

    public function restaurar($id)
    {
        $datos=ParaleloSeneJornadaCarreraModel::onlyTrashed()->find($id)->restore();
         return response()->json(["mensaje restaurar"]);
    }
}
