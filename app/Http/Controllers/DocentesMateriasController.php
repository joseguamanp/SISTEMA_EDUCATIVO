<?php

namespace App\Http\Controllers;


use App\DocenteInfoPerModel;
use App\DocentesMateriasModel;
use App\MateriasModel;
use App\MateriaxParaleloModel;
use App\ParaleloAcad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocentesMateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('acad_docentes_materia')
            ->join('acad_docente', 'acad_docente.id', '=', 'acad_docentes_materia.id_docente')
            ->join('acad_materia_x_paralelo', 'acad_materia_x_paralelo.id', '=', 'acad_docentes_materia.id_materia_x_paralelo')
            ->join ('acad_mallas_materias', 'acad_mallas_materias.id', '=', 'acad_materia_x_paralelo.id_materia_malla')
            //->join ('acad_paralelos_x_periodo', 'acad_paralelos_x_periodo.id', '=', 'acad_materia_x_paralelo.id_paralelo_periodo')
            ->join ('acad_materias', 'acad_materias.id', '=', 'acad_mallas_materias.id_materia')
            //->join ('acad_paralelos_sede_jornada_carrera', 'acad_paralelos_sede_jornada_carrera.id', '=', 'acad_paralelos_x_periodo.id_para_sede_jor_car')
            //->join ('acad_paralelos', 'acad_paralelos.id', '=', 'acad_paralelos_sede_jornada_carrera.id_paralelo')
            ->join ('acad_paralelos', 'acad_paralelos.id', '=', 'acad_docentes_materia.id_materia_x_paralelo')
            ->select('acad_docentes_materia.*','acad_docente.primerApellido',/*'acad_materia_x_paralelo.*', 'acad_materias.id',*/ 'acad_materias.nombre_materia', /*'acad_paralelos.id',*/'acad_paralelos.nombre_paralelo')
            ->get();

        $getdats = $this->getdatos();
        //dd($data);
        return view('admin.docenteMateria.index',['data' =>$data,'getdato' => $getdats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getId(){
        $id = DocentesMateriasModel::whereRaw('id > ? or deleted_at <> null', [0])->get();
        $next = count($id);
        if($next > 0 ){
            $next+=1;
        }else
            $next =1;
        return $next;
    }

    public function getdatos()
    {
        $decision=array('SI','NO');
        return $getdato=array('Docente' =>DocenteInfoPerModel::all(),
            'materia'=>MateriasModel::all(),
            'paralelo'=>ParaleloAcad::all(),
            'materiaparalelo'=>MateriaxParaleloModel::all(),
            'decision'=>$decision);
    }


    public function create()
    {
        $getdatos=$this->getdatos();
        return view('admin.docenteMateria.index',['getdato' =>$getdatos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all()); exit();
        $id_usu_cre = Auth::user()->id;
        $id = $this->getId();
        DocentesMateriasModel::create ([
            'id' => $id,
            'id_docente'=>$request->input('id_docente'),
            'id_materia_x_paralelo'=>$request->input('id_materia_x_paralelo'),
            'id_usu_cre' => $id_usu_cre,
        ]);
        return $this->index();
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
        $getdato=$this->getdatos();
        $data = DB::table('acad_docentes_materia')->where('id_docente',$id);
        dd($data);exit();
        return view('admin.docenteMateria.edit', ["data"=>$data, 'getdato' =>$getdato]);
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
        dd($request->all()); exit();
        $data=DocentesMateriasModel::find($id);
        $data->id_docente=$request->input('id_docente');
        $data->id_materia_x_paralelo=$request->input('id_materia_x_paralelo');
        $data->save();
        return redirect('/admin/docenteMateria/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DocenteMateria=DocentesMateriasModel::find($id);
        $DocenteMateria->delete();
        return redirect('/admin/docenteMateria/');
    }


    public function restaurar($id)
    {
        $datos=DocentesMateriasModel::onlyTrashed()->find($id)->restore();
        return redirect('/admin/docenteMateria/');
    }
}
