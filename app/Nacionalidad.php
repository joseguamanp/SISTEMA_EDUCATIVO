<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nacionalidad extends Model
{
    use SoftDeletes;

    protected $table = 'sene_paises';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
    	'etiqueta',
    	'id_usu_cre',
    	'fecha_cre',
    	'id_usu_mod',
    	'fecha_mod',
    ];
}
