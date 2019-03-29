<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocenteInfoAcadModelo extends Model
{
    use SoftDeletes;
    protected $table = 'acad_doce_infacademica';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id',
        'numDocumento',
        'nivelForm',
        'fecha_ing',
        'fecha_sal',
        'relacionLab',
        'ingresoIns',
        'escaDocen',
        'cargoDirectivo',
        'tiempoDedi',
        'numAsignaturas',
        'docSuperior',
        'cursaEstSup',
        'nombreInst',
        'id_usu_cre',
        'fecha_cre',
        'id_usu_mod',
        'fecha_mod',
        'deleted_at',
    ];
}
