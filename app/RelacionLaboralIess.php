<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RelacionLaboralIess extends Model
{
    use SoftDeletes;

    protected $date = ['deleted_at'];
    protected $table = 'sene_doce_relacionlaboraliies';

    protected $fillable = [
        'id', 'etiqueta', 'deleted_at',
        'id_usu_cre', 'fecha_cre',
        'id_usu_mod', 'fecha_mod',
    ];
}
