<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class MallasCarrera extends Model
{
    use softDeletes;
    protected $table='acad_mallas_carrera';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id', 'id_malla','id_carrera' ,'titulo', 'id_usu_cre', 'fecha_cre', 'id_usu_mod', 'fecha_mod', 'deleted_at'
    ];
}
