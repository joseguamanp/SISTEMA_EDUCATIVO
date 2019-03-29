<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VinculacionSociedad extends Model
{
	use SoftDeletes; //Implementamos 

    protected $dates = ['deleted_at'];
    protected $table = 'sene_participaenproyectovinculacionsociedad';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id','etiqueta','id_usu_cre','id_usu_mod',
    ];
}
