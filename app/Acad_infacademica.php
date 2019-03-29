<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acad_infacademica extends Model
{
    use SoftDeletes; //Implementamos 

    protected $dates = ['deleted_at'];

    protected $table = 'acad_periodos';

    protected $fillable = [
        'id', 
        'nombre_periodo',
        'id_ciclo',
        'deleted_at','anio_periodo','id_usu_cre'
    ];
}
