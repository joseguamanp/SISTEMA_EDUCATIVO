<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EscalafonDocente extends Model
{
    use SoftDeletes;

    protected $table = 'sene_doce_escalafondocenteid';

    protected $date = ['deleted_at'];

    protected $fillable = [
      'id', 'etiqueta', 'id_usu_cre', 'fecha_usu', 'id_usu_mod', 'fecha_mod',
    ];
}
