<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\tipodocumento;
use App\sexo;
use App\genero;
use App\estadocivil;
use App\Etnia;
use App\TipoSangre;
use App\tipoDiscapacidad;
use App\Pais;
use App\Provincias;
use App\Cantones;
use App\CategoriaMigratoria;
use App\AcaEstuInfoPer;
//
use Illuminate\Http\Request;
use App\tipoColegio;
use App\TipMatricula;
use App\acad_periodos;
use App\Paralelo;
use App\NivAcademico;
use App\Carreras;
use App\ModalidadCar;
use App\TituloCarrera;
//use App\TipoCarrera;
use App\JornadaCar;
use App\InformacionGlobalModel;
//
use App\User;
use App\TipoBeca;
use App\RazonBeca1;
use App\RazonBeca2;
use App\RazonBeca3;
use App\RazonBeca4;
use App\RazonBeca5;
use App\RazonBeca6;
use App\FinanciamientoBeca;
use App\acadEstuInfoBeca;
use App\TipoBachillerato;
//
use App\VinculacionSociedad;
use App\AlcanceProyectoVinculacion;
use App\EstuOcup;
use App\SectorEconomico;
use App\EstIngreso;
use App\NivelFormacionPadre;
use App\NivelFormacionMadre;
use App\AcadEstuLabEco;

class InformacionGlobalController extends Controller
{
    public function index()
    {
        $datos = $this->getData();
    	  $academico=$this->informacion();
        $beca = $this->informacionBecas();
        $laboral = $this->informacionLaboral();
    	  return view('informacion.index',['academico'=>$academico,'beca'=>$beca,'datos' => $datos,'laboral' => $laboral]);
    }
    
    public function informacion()
    {
    	$superior=array('SI','NO');
    	return $academico = array('tipocolegio' =>tipoColegio::all(),
    							  'tipobachillerato'=>TipoBachillerato::all(),
    							  'tipotitulosuperior'=>$superior,
    							  'tipomatricula'=>TipMatricula::all(),
    							  'periodo'=>acad_periodos::All(),
    							  'nivelacademico'=>NivAcademico::all(),
    							  'paralelo'=>Paralelo::all(),
    							  'nombrecarrera'=>Carreras::all(),
    							  'titulocarrera'=>TituloCarrera::all(),
    							 // 'tipocarrera'=>TipoCarrera::all(),
    							  'modalidadcarrera'=>ModalidadCar::all(),
    							  'jornadacarrera'=>JornadaCar::all(),
    							  'repetidocarrera'=>$superior,
    							  'perdiogratuidad'=>$superior
    						);
    }
    public function infacademica(Request $request)
    {
        $dato = InformacionGlobalModel::create ($request->all());
        return redirect("/informacionGlobal");
    }

    public function informacionBecas(){
        return $beca = array('user' => User::All(),
                            'tipobeca' => TipoBeca::All(),
                            'primerarazonbeca' => RazonBeca1::All(),
                            'segundarazonbeca' => RazonBeca2::All(),
                            'tercerarazonbeca' => RazonBeca3::All(),
                            'cuartarazonbeca' => RazonBeca4::All(),
                            'quintarazonbeca' => RazonBeca5::All(),
                            'sextarazonbeca' => RazonBeca6::All(),
                            'financiamientobeca' => FinanciamientoBeca::All());
    }

    public function infoBecas(Request $request){
        $beca = acadEstuInfoBeca::create($request->all());
        return redirect('/informacionGlobal/');
    }

    public function getData(){

        return $arrayName=array(
                                'documentos' => tipodocumento::All(),
                                'sexos' => sexo::All(),
                                'generos' => genero::All(),
                                'estado_civiles' => estadocivil::All(),
                                'etnias' => Etnia::All(),
                                'tipo_sangres' => TipoSangre::All(),
                                'tipo_discapacidad' => tipoDiscapacidad::All(),
                                'paises' => Pais::All(),
                                'provincias' => Provincias::All(),
                                'cantones' => Cantones::All(),
                                'categoria_migratorias' => CategoriaMigratoria::All(),
                                );
    }

    public function AcaEstuInfoPer(Request $request)
    {
        $datos=AcaEstuInfoPer::create($request->all());
        return redirect('/informacionGlobal/');
    }
    public function informacionLaboral(){
        return $arrayName=array(
            'tipoColegios' => tipoColegio::All(),
            'VinculacionSociedads' => VinculacionSociedad::All(),
            'AlcanceProyectoVinculacions' => AlcanceProyectoVinculacion::All(),
            'OcupacionEstudiantes'=>EstuOcup::All(),
            'SectorEconomicos' => SectorEconomico::All(),
            'EstIngresos' => EstIngreso::All(),
            'NivelFormacionPadres' => NivelFormacionPadre::All(),
            'NivelFormacionMadres' => NivelFormacionMadre::All(),
        );
    }
        public function AcaEstuLabEco(Request $request){
        $datos=AcadEstuLabEco::create($request->all());
        return redirect('/informacionGlobal');
    }
}
