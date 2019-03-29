<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class acad_periodos extends Model
{
     use SoftDeletes; //Implementamos 

   protected $dates = ['deleted_at'];

    protected $table = 'acad_periodos';

    protected $fillable = [
        'id', 'nombre_periodo','id_ciclo','anio_periodo','id_usu_cre', 'nombre_corto'
    ];
}
