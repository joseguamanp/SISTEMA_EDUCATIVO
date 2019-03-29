<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    protected $table = 'sene_modalidadcarrera';


    protected $fillable = [
    	'id',
    	'etiqueta',
    	'id_usu_cre',
    	'fecha_cre',
    	'id_usu_mod',
    	'fecha_mod',
    ];
}
