<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocenteTiempo extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'sene_doce_tiempodedicacionid';

    protected $fillable = [
        'id',
        'etiqueta',
        'id_usu_cre',
        'fec_cre',
        'id_usu_mod',
        'fecha_mod',
    ];
}
