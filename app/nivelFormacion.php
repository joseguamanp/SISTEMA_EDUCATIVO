<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\softDeletes;
class nivelFormacion extends Model
{
		use softDeletes;
    protected $dates = ['deleted_at'];
    protected $table='acad_nivel_formacion';
    protected $fillable = [
        'id', 'nombre', 'id_usu_cre', 'fecha_cre', 'id_usu_mod', 'fecha_mod',
    ];
}
