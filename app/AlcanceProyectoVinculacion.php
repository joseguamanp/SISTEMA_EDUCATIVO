<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlcanceProyectoVinculacion extends Model
{
    use SoftDeletes; //Implementamos

   	protected $dates = ['deleted_at'];

    protected $table = 'sene_tipoalcanceproyectovinculacionid';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'etiqueta', 'id_usu_cre', 'fecha_cre', 'id_usu_mod', 'fecha_mod',
    ];
}
