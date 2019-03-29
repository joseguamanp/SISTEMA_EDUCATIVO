<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ciclos extends Model
{
    use SoftDeletes;
    protected $dates = [ 'deleted_at'];
    protected $table = 'acad_ciclos';
    protected $fillable = [
        'id',
        'nombre_ciclo',
        'nombre_corto',
        'id_usu_cre',
        'fecha_cre',
        'id_usu_mod',
        'fecha_mod'
    ];
}
