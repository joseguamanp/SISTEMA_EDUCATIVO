<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AreasMateriasModel extends Model
{
    use softDeletes;
    protected $dates = ['deleted_at'];
    protected $table='acad_materias';
    protected $fillable = [
        'id', 'nombre_materia'
    ];
}
