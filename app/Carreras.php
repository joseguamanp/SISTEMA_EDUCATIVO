<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Carreras extends Model
{
    protected $table = 'acad_carrera';
    use SoftDeletes; //Implementamos

   protected $dates = ['deleted_at'];

    protected $fillable = [
    	'id',
    	'nombreCarrera',
    	'id_modalidad',
    	'id_usu_cre',
    	'fecha_cre',
    	'id_usu_mod',
    	'fecha_mod',
    ];
}
