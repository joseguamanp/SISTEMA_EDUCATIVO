<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class MateriaXParalelo extends Model
{
    //use SoftDeletes;
    protected $table = 'acad_materia_x_paralelo';

    //protected $dates = ['deleted_at'];
    protected $fillable = [
    	'id',
    	'id_paralelo_periodo',
    	'id_materia_malla',
    ];
}
