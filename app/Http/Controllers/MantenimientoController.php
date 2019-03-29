<?php

namespace App\Http\Controllers;
use http\Env\Request;
use Illuminate\Support\Facades\DB;

class MantenimientoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function vista()
    {
        $carrera = DB::table('sene_modalidadcarrera')->get();
        $jornada = DB::table('sene_jornadacarrera')->get();
        $tipo = DB::table('sene_tipomatriculaid')->get();
        $nivel = DB::table('sene_nivelacademicocurso')->get();
        $paralelo = DB::table('sene_paraleloid')->get();

        $gratuidad = DB::table('sene_haperdidolagratuidad')->get();
        $pension = DB::table('sene_recibepensiondiferenciada')->get();
        $ocupacion = DB::table('sene_estudianteocupacionid')->get();
        $ingreso = DB::table('sene_ingresosestudianteid')->get();
        $practicas = DB::table('sene_harealizadopracticaspreprofesionales')->get();

        $beca = DB::table('sene_tipobecaid')->get();
        $beca1 = DB::table('sene_primerarazonbecaid')->get();
        $beca2 = DB::table('sene_segurazonbecaid')->get();
        $beca3 = DB::table('sene_tercerarazonbecaid')->get();
        $beca4 = DB::table('sene_cuartarazonbecaid')->get();
        $beca5 = DB::table('sene_quintarazonbecaid')->get();
        $beca6 = DB::table('sene_sextarazonbecaid')->get();

        return view('crud.vista',compact('carrera', 'jornada', 'tipo', 'nivel', 'paralelo','gratuidad','pension','ocupacion',
            'ingreso','practicas','beca','beca1','beca2','beca3','beca4','beca5','beca6'));
        /*return view('crud.vista', ['carrera' => $carrera],
                                        ['jornada' => $jornada],
                                        ['nivel'   => $nivel  ] );*/
    }
}
