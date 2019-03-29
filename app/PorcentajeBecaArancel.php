<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PorcentajeBecaArancel extends Model
{
    use SoftDeletes;

    protected $table = 'sene_porcentajebecaarancel';

    protected $fillable = [
    	'id', 'porcentaje', 'id_usu_cre', 'id_usu_mod',
    ];

}
