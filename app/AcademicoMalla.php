<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicoMalla extends Model
{
    //use SoftDeletes;
   //protected $dates = ['deleted_at'];

    protected $table = 'acad_mallas';
    protected $primaryKey = 'id';


    protected $fillable = [
    	'id',
    	'nombre_malla',
    	'nombre_corto',
    	'num_sem_per_aca',
    	'id_usu_cre',
      'fecha_cre',
      'id_usu_mod',
      'fecha_mod',
    ];
}
