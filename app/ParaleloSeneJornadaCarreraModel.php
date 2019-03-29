<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParaleloSeneJornadaCarreraModel extends Model
{
    use SoftDeletes;

    protected $table = 'acad_paralelos_sede_jornada_carrera';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id', 
        'id_carrera', 
        'id_sede',
        'id_jornada', 
        'id_paralelo', 
        'id_usu_cre',  
        'id_usu_mod',
    ];
}
