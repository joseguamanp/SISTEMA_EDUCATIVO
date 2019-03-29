<?php

namespace App\Http\Controllers;

use App\Cantones;
use App\CargoDirectivo;
use App\DocenteInfoBecaModel;
use App\DocenteInfoPerModel;
use App\DocenteInfoAcadModelo;
use App\DocenteTiempo;
use App\EscalafonDocente;
use App\estadocivil;
use App\Etnia;
use App\genero;
use App\Nacionalidad;
use App\NivForDoce;
use App\Provincias;
use App\RelacionLaboralIess;
use App\sexo;
use App\TipoBeca;
use App\tipoDiscapacidad;
use App\tipodocumento;
use App\TipoEnfCast;
use App\TipoFinanciamientoDoceModel;
use App\TipoSangre;
use App\CategoriaMigratoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;   
use Illuminate\Support\Facades\Auth;

class DocentesController extends Controller  
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!isset($_SESSION))
            session_start();
        
        $this->getDatos();
        $data = $this->getDatosPer();
        // dd($data['tipoDocumento']); exit();
        return view('docentes.main.index',['data' => $data]);
    }

    //Obtencion de Datos esenciales
    public function getDatos()
    {
        $nom = Auth::user()->nombre;
        $ape = Auth::user()->apellido;
        $nombresSep = explode(" ",$nom);
        $apellidosSep = explode(" ",$ape);

        $_SESSION['cedula'] = Auth::user()->cedula;
        $_SESSION['segNombre'] = $nombresSep[1];
        $_SESSION['priNombre'] = $nombresSep[0];
        $_SESSION['priApellido'] = $apellidosSep[0];
        $_SESSION['segApellido'] = $apellidosSep[1];
    }

    //Obtencion de datos
        //informacion Personal
    public function getDatosPer()
    {
        $datos = array('tipoDocumento' => tipodocumento::all(),
                       'sexo' => sexo::all(),
                       'genero' => genero::all(),
                       'etnia' => Etnia::all(),
                       'estadocivil' => estadocivil::all(),
                       'tipoSangre' => TipoSangre::all(),
                       'nacionalidad' => Nacionalidad::all(),
                       'categoriaMigratoria' => CategoriaMigratoria::all(),
                       'tipoDiscapacidad' => tipoDiscapacidad::all(),
                       'tipoEnfCatas' => TipoEnfCast::all());
        return $datos;
    }
    
        //Información Academica
    public function getDatosAcaLab()
    {
        $datos = array('nivFormacion' => NivForDoce::all(),
                       'relLaboral' => RelacionLaboralIess::all(),
                       'escaDocente' => EscalafonDocente::all(),
                       'cargoDir' => CargoDirectivo::all(),
                       'tiemDedicacion' => DocenteTiempo::all());
        return $datos;
    }
        //Información Beca

    public function getDatosBeca()
    {
        $datos = array('tipoBeca' => TipoBeca::all(),
                       'tipoFinanciamiento' => TipoFinanciamientoDoceModel::all());
        return $datos;
    }

    public function getId(){
        $id = DocenteInfoPerModel::whereRaw('id > ? <> null', [0])->get();
        $next = count($id);
        if($next > 0 ){
            $next+=1;
        }else
            $next =1;
        return $next;
    }
    //guardar datos
    //Información Personal
    public function saveInfoPer(Request $request){
        
        $ver = DocenteInfoPerModel::where('numIdentificacion','=',$request->cedula)->count();
        var_dump($ver);
        if ($ver > 0){
            $doce = DB::table('acad_docente')->where('numIdentificacion',$request->cedula)->get();
            $datos = DocenteInfoPerModel::find($doce[0]->id);
            $datos->id_usu_mod = Auth::user()->id;
        }else{
            $datos = new DocenteInfoPerModel();
            $datos->tipoDocumento = $request->tipoDocumento;
            $datos->numIdentificacion = $request->cedula;
            $datos->id_usu_cre = Auth::user()->id;
        }
        $datos -> id = $this->getId();
        $datos->sexo = $request->sexo;
        $datos->genero = $request->genero;
        $datos->primerApellido = $request->primerApellido;
        $datos->segundoApellido = $request->segundoApellido;
        $datos->primerNombre = $request->primerNombre;
        $datos->segundoNombre = $request->segundoNombre;
        $datos->correo = $request->correo;
        $datos->numCelular = $request->numCelular;
        $datos->numDomicilio = $request->numDomicilio;
        $datos->dirDomiciliaria = $request->dirDomiciliaria;
        $datos->codPostal = $request->codPostal;
        $datos->contEmer = $request->contEmer;
        $datos->parent = $request->parent;
        $datos->nroCont = $request->nroCont;
        $datos->etnia = $request->etnia;
        $datos->nomIdi = $request->nomIdi;
        $datos->fec_nac = $request->fec_nac;
        $datos->tipoSangre = $request->tipoSangre;
        $datos->pais = $request->pais;
        $datos->provincias = $request->provincias;
        $datos->canton = $request->canton;
        $datos->catMigratoria = $request->catMigratoria;
        $datos->paisResi = $request->paisResi;
        $datos->provResi = $request->provResi;
        $datos->cantResi = $request->cantResi;
        $datos->estCivil = $request->estCivil;
        $datos->porDis = $request->porDis;
        $datos->nroCona =  $request->nroCona;
        $datos->tipoDiscapacidad = $request->tipoDiscapacidad;
        $datos->tipoEnfeCatas = $request->tipoEnfeCatas;
        $datos->save();
        return redirect('/docentes/main')->with('status', 'Registro Exitoso');
    }

    //Información Academica y Laboral
    public function saveInfAcada (Request $request){
        $ver = DocenteInfoAcadModelo::where('numDocumento','=',$request->cedula)->count();
        //var_dump($ver); exit();
        if ($request->realizoPub === 'SELECCIONE')
            $request->realizoPub = '';
        if($ver > 0) {
            $doce = DB::table('acad_doce_infacademica')->where('numDocumento',$request->cedula)->get();
            $data = DocenteInfoAcadModelo::find($doce[0]->id);
        }else{
            $data = new DocenteInfoAcadModelo();
            $data->numDocumento = $request->cedula;
            $data->id_usu_cre = Auth::user()->id;
        }
        $data -> id = $this->getId();
        $data->nivelForm = $request->nivelForm;
        $data->fecha_ing = $request->fecha_ing;
        $data->fecha_sal = $request->fecha_sal;
        $data->relacionLab = $request->relacionLab;
        $data->ingresoIns = $request->ingresoIns;
        $data->escaDocen = $request->escaDocen;
        $data->cargoDirectivo = $request->cargoDirectivo;
        $data->tiempoDedi = $request->tiempoDedi;
        $data->numAsignaturas = $request->numAsignaturas;
        $data->docSuperior = $request->docSuperior;
        $data->cursaEstSup = $request->cursaEstSup;
        $data->nombreInst = $request->nombreInst;
        $data->save();
        return redirect('/docentes/main')->with('status', 'Registro Exitoso');
    }

    //Información Beca
    public function saveInfoBeca(Request $request){
        $ver = DocenteInfoBecaModel::where('cedula','=',$request->cedula)->count();
        //var_dump($ver); exit();
        if ($request->realizoPub === 'SELECCIONE')
            $request->realizoPub = '';
        if($ver > 0) {
            $doce = DB::table('acad_docente_inf_beca')->where('cedula',$request->cedula)->get();
            $datos = DocenteInfoBecaModel::find($doce[0]->id);
            //echo $doce[0]->id; exit();
        }else{
            $datos = new DocenteInfoBecaModel();
            $datos->id_usu_cre = Auth::user()->id;
            $datos->cedula = $request->cedula;
            $this->verificarBeca($request,$datos);
            //var_dump($ver); exit();
        }
            $datos -> id = $this->getId();
            $datos->poseeBeca = $request->poseeBeca;
            $datos->tipoBeca = $request->tipoBeca;
            $datos->valorBeca = $request->valorBeca;
            $datos->tipoFina = $request->tipoFina;
            $datos->realizoPub = $request->realizoPub;
            $datos->nroPub = $request->nroPub;
            $datos->save();
        return redirect('/docentes/main')->with('status', 'Registro Exitoso');
    }

    public function verificarBeca(Request $request, DocenteInfoBecaModel $datos){
        if($request->poseeBeca === 'NO'){
            $datos->tipoBeca = '';
            $datos->valorBeca = '';
            $datos->tipoFina = '';
            $datos->realizoPub = '';
            $datos->nroPub = '';
        }
    }


    public function getProvincias(Request $request){
        $data = Provincias::where('id_pais',$request->all())->get();
        // return $data->toJson(JSON_PRETTY_PRINT);
        return response()->json($data);
    }

    public function getCantones(Request $request){
        $data = Cantones::where('id_provincia',$request->all())->get();
        return response()->json($data);
    }

    public function vistaInfPer()
    {
        $data = $this->getDatosPer();
        return view('docentes.infPersonal.index',['data'=>$data]);
    }

    public function vistaInfAcadLab()
    {
        $data = $this->getDatosAcaLab();
        return view('docentes.infAcademica.index',['data'=>$data]);
    }

    public function vistaInfBeca()
    {
        $data = $this->getDatosBeca();
        return view('docentes.infBeca.index',['data'=>$data]);
    }
}
