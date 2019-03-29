<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tipoSangre extends Model
{
    protected $table = 'sene_tiposangre';
    use SoftDeletes; //Implementamos 

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id','etiqueta', 'id_usu_cre', 'id_usu_mod'
    ];
}
