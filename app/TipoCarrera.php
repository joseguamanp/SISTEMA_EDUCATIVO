<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoCarrera extends Model
{
    use SoftDeletes; //Implementamos 

    protected $dates = ['deleted_at'];
    protected $table='sene_tipocarrera';
    protected $fillable = [
        'id','etiqueta','id_usu_cre','fecha_cre','id_usu_mod','fecha_mod',
    ];
}
