<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class ParaleloAcad extends Model
{
    use softDeletes;
    protected $table='acad_paralelos';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id', 'nombre_paralelo','abreviatura', 'id_homologacion_sene', 'observacion', 'id_usu_cre', 'fecha_cre', 'id_usu_mod', 'fecha_mod', 'deleted_at'
    ];
}
