<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocenteInfoPerModel extends Model
{
    protected $table = 'acad_docente';

    protected $fillable = ['
        id',
        'tipoDocumento',
        'numIdentificacion',
        'sexo',
        'genero',
        'primerApellido',
        'segundoApellido',
        'primerNombre',
        'segundoNombre',
        'correo',
        'numCelular',
        'numDomicilio',
        'dirDomiciliaria',
        'codPostal',
        'contEmer',
        'parent',
        'nroCont',
        'etnia',
        'nomIdi',
        'fec_nac',
        'tipoSangre',
        'pais',
        'provincias',
        'canton',
        'catMigratoria',
        'paisResi',
        'provResi',
        'cantResi',
        'estCivil',
        'porDis',
        'nroCona',
        'tipoDiscapacidad',
        'tipoEnfeCatas',
       'id_usu_cre',
      'fecha_cre',
      'id_usu_mod',
      'fecha_mod'
        ];
}
