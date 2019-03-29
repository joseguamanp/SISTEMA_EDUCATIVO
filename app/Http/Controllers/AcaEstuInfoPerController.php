<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\AcaEstuInfoPer;

class AcaEstuInfoPerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = $this->getData();
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
    public function update(Request $request, $cedula)
    {

        $tipoDocumento = $request->input('tipoDocumento');
        $numIdentificacion = $request->input('numIdentificacion');
        $primerApellido = mb_strtoupper($request->input('primerApellido'),'UTF-8');
        $segundoApellido = mb_strtoupper($request->input('segundoApellido'),'UTF-8');
        $primerNombre = mb_strtoupper($request->input('primerNombre'),'UTF-8');
        $segundoNombre = mb_strtoupper($request->input('segundoNombre'),'UTF-8');
        $sexo = $request->input('sexo');
        $genero = $request->input('genero');
        $estadoCivil = $request->input('estadoCivil');
        $etnia = $request->input('etnia');
        $tipoSangre = $request->input('tipoSangre');
        $hablaIdiomaAnces = $request->input('hablaIdiomaAnces');
        $idiomaAnces = mb_strtoupper($request->input('idiomaAnces'),'UTF-8');

        $fecha = $request->input('fecha_nac');
        $partes = explode("/", $fecha);
        $fecha_nac = $partes[2]."-".$partes[1]."-".$partes[0];

        $correo = $request->input('correo');
        $numCelular = $request->input('numCelular');
        $numConvencional = $request->input('numConvencional');
        $contactoEmergencia = mb_strtoupper($request->input('contactoEmergencia'), 'UTF-8');
        $parentezco = mb_strtoupper($request->input('parentezco'), 'UTF-8');
        $numContacto = $request->input('numContacto');
        $dirDomiciliaria = mb_strtoupper($request->input('dirDomiciliaria'),'UTF-8');
        $codigoPostal = $request->input('codigoPostal');
        $paisNacionalidad = strtoupper($request->input('paisNacionalidad'));
        $provinciaNacionalidad = strtoupper($request->input('provinciaNacionalidad'));
        $cantonNacionalidad = strtoupper($request->input('cantonNacionalidad'));
        $categoriaMigratoria = strtoupper($request->input('categoriaMigratoria'));
        $paisResidencia = strtoupper($request->input('paisResidencia'));
        $provinciaResidencia = strtoupper($request->input('provinciaResidencia'));
        $cantonResidencia = strtoupper($request->input('cantonResidencia'));
        $discapacidad = strtoupper($request->input('discapacidad'));
        $porcentajeDis = $request->input('porcentajeDis');
        $numCarnetConadis = strtoupper($request->input('numCarnetConadis'));
        $tipoDiscapacidad = strtoupper($request->input('tipoDiscapacidad'));
        $id_usu_mod = Auth::user()->id;
       
        AcaEstuInfoPer::where('numIdentificacion','=',$cedula)
                      ->update(['tipoDocumento' => $tipoDocumento,
                                'numIdentificacion' => $cedula,
                                'primerApellido' => $primerApellido,
                                'segundoApellido' => $segundoApellido,
                                'primerNombre' => $primerNombre,
                                'segundoNombre' => $segundoNombre,
                                'sexo' => $sexo,
                                'genero' => $genero,
                                'estadoCivil' => $estadoCivil,
                                'etnia' => $etnia,
                                'tipoSangre' => $tipoSangre,
                                'hablaIdiomaAnces' => $hablaIdiomaAnces,
                                'idiomaAnces'=> $idiomaAnces,
                                'fecha_nac' => $fecha_nac,
                                'correo'=> $correo,
                                'numCelular'=>$numCelular,
                                'numConvencional' => $numConvencional,
                                'contactoEmergencia'=>$contactoEmergencia,
                                'parentezco'=>$parentezco,
                                'numContacto'=>$numContacto,
                                'dirDomiciliaria'=>$dirDomiciliaria,
                                'codigoPostal'=>$codigoPostal,
                                'paisNacionalidad'=>$paisNacionalidad,
                                'provinciaNacionalidad'=>$provinciaNacionalidad,
                                'cantonNacionalidad'=>$cantonNacionalidad,
                                'categoriaMigratoria'=>$categoriaMigratoria,
                                'paisResidencia'=>$paisResidencia,
                                'provinciaResidencia'=>$provinciaResidencia,
                                'cantonResidencia'=>$cantonResidencia,
                                'discapacidad'=>$discapacidad,
                                'porcentajeDis'=>$porcentajeDis,
                                'numCarnetConadis'=>$numCarnetConadis,
                                'tipoDiscapacidad'=>$tipoDiscapacidad,
                                'id_usu_mod'=>$id_usu_mod]);

       return redirect('informacionGlobal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
