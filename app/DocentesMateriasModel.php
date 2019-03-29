<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class DocentesMateriasModel extends Model
{
    use softDeletes;
    protected $table='acad_docentes_materia';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id', 'id_docente', 'id_materia_x_paralelo', 'id_usu_cre', 'fecha_cre', 'id_usu_mod', 'fecha_mod', 'deleted_at'
    ];
}
