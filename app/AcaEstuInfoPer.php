<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AcaEstuInfoPer extends Model
{
   	//use SoftDeletes;

   	//protected $dates = ['deleted_at'];
    protected $table = 'acad_estudiante';
    protected $primaryKey = 'id';

    protected $fillable = [
        'tipoDocumento',
        'numIdentificacion',
        'primerApellido',
        'segundoApellido',
        'primerNombre',
        'segundoNombre',
        'sexo',
        'genero',
        'estadoCivil',
        'etnia',
        'tipoSangre',
        'hablaIdomaAnces',
        'idiomaAnces',
        'fecha_nac',
        'correo',
        'numCelular',
        'numConvencional',
        'contactoEmergencia',
        'parentezco',
        'numContacto',
        'dirDomiciliaria',
        'codigoPostal',
        'paisNacionalidad',
        'provinciaNacionalidad',
        'cantonNacionalidad',
        'categoriaMigratoria',
        'paisResidencia',
        'provinciaResidencia',
        'cantonResidencia',
        'discapacidad',
        'porcentajeDis',
        'numCarnetConadis',
        'tipoDiscapacidad',
        'id_usu_cre',
        'fecha_cre',
        'id_usu_mod',
        'fecha_mod',
    ];
}
