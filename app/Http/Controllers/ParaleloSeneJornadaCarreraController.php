<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParaleloSeneJornadaCarreraModel;
use App\JornadaCar;
use App\Carreras;
use App\AcadSedes;
use App\ParaleloAcad;
use App\AcadPeriodos;
use App\ParalelosxPeriodoModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ParaleloSeneJornadaCarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getdatos=$this->getdatos();
        //$getdatos = AcadPeriodos::all();
        return view('admin.pa_se_jor_car.index',['getdatos'=>$getdatos]);
    }

   public function getdatos()
    {
    	return $getdatos=array(
                        'carrera' => Carreras::all(),
                        'sedes' => AcadSedes::all(),
                        'jornada' => JornadaCar::all(),
                        'paralelo' => ParaleloAcad::all(),                        
                        );
    }

    public function getUltimaSede(){
      $data = DB::table('acad_sedes')->count();
      return $data;
    }             

    public function getParalelos(Request $request)
    {
        $data = "Dato no encontrado";
        if($request->op == 1){
            if ($request->id_sede == 0) {
                # code...
            }else{
                if(isset($request->id_carrera) && ($request->id_carrera != 0)){
                    $data = $this->getSedesXCarreras($request);
                }
                if (isset($request->id_jornada) && ($request->id_jornada != 0)) {
                    $data = $this->getSedesXCarrerasXJornadas($request);
                }
            }
        }
        return response()->json($data);  
    }

    public function getSedesXCarreras(Request $request)
    {
        $data = DB::table('acad_paralelos_sede_jornada_carrera')
                    ->join('acad_sedes','acad_sedes.id','=','acad_paralelos_sede_jornada_carrera.id_sede')
                    ->join('acad_carrera','acad_carrera.id','=','acad_paralelos_sede_jornada_carrera.id_carrera')
                    ->join('acad_paralelos','acad_paralelos.id','=','acad_paralelos_sede_jornada_carrera.id_paralelo')
                    ->select('acad_paralelos.id','acad_paralelos.nombre_paralelo','acad_paralelos_sede_jornada_carrera.*')
                    ->where('acad_paralelos_sede_jornada_carrera.id_sede',$request->id_sede)
                    ->where('acad_paralelos_sede_jornada_carrera.id_carrera',$request->id_carrera)
                    ->get();
        return $data;
    }

    public function getSedesXCarrerasXJornadas(Request $request)
    {
         $data = DB::table('acad_paralelos_sede_jornada_carrera')
                    ->join('acad_sedes','acad_sedes.id','=','acad_paralelos_sede_jornada_carrera.id_sede')
                    ->join('acad_carrera','acad_carrera.id','=','acad_paralelos_sede_jornada_carrera.id_carrera')
                    ->join('sene_jornadacarrera','sene_jornadacarrera.id','=','acad_paralelos_sede_jornada_carrera.id_jornada')
                    ->join('acad_paralelos','acad_paralelos.id','=','acad_paralelos_sede_jornada_carrera.id_paralelo')
                    ->select('acad_paralelos.id','acad_paralelos.nombre_paralelo','acad_paralelos_sede_jornada_carrera.*')
                    ->where('acad_paralelos_sede_jornada_carrera.id_sede',$request->id_sede)
                    ->where('acad_paralelos_sede_jornada_carrera.id_carrera',$request->id_carrera)
                    ->where('sene_jornadacarrera.id',$request->id_jornada)
                    ->get();
         return $data;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$getdatos=$this->getdatos();
        //return view('admin.AcadMallasMaterias.index',['getdatos' =>$getdatos]);
    }

    public function getId(){
        $id = ParaleloSeneJornadaCarreraModel::withTrashed()->get();
        $next = count($id);
        if($next > 0){
            $next+=1;
        }else
            $next =1;
        return $next;
    }

    public function store(Request $request)
    {
            $id_usu_cre = Auth::user()->id;
            $id = $this->getId();
            ParaleloSeneJornadaCarreraModel::create ([
                'id' => $id,
                'id_sede'=>$request->input('id_sede'),
                'id_carrera'=>$request->input('id_carrera'),
                'id_jornada'=>$request->input('id_jornada'),
                'id_paralelo'=>$request->input('id_paralelo'),
                'id_usu_cre'=>$id_usu_cre,
            ]);
    }

    public function validarParaleloNoRepita(Request $request)
    {
        $query = "select count(acad_paralelos.id) as paralelo "
               ."from acad_paralelos "
               ."where acad_paralelos.id = (select acad_paralelos_sede_jornada_carrera.id_paralelo "
                                          ."from acad_paralelos_sede_jornada_carrera "
                                          ."where acad_paralelos_sede_jornada_carrera.id_carrera = ".$request->id_carrera." "
                                          ."and acad_paralelos_sede_jornada_carrera.id_jornada = ".$request->id_jornada." "
                                          ."and acad_paralelos_sede_jornada_carrera.id_sede = ".$request->id_sede." "
                                          ."and acad_paralelos_sede_jornada_carrera.id_paralelo = ".$request->id_paralelo.");";

        $data =  DB::select($query);
        return response()->json($data);
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
        //dd($id);exit();
        $getdatos=$this->getdatos();
        $data = ParaleloSeneJornadaCarreraModel::find($id);
        //dd($data);exit();
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
        $data->id_usu_mod = Auth::user()->id;
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
        //return response()->json(["mensaje eliminado"]);
        return redirect('/admin/asignacion/');
    }

    public function restaurar($id)
    {
        $datos=ParaleloSeneJornadaCarreraModel::onlyTrashed()->find($id)->restore();
        return redirect('/admin/asignacion/');
    }
}
