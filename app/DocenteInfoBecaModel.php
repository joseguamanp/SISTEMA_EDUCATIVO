<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocenteInfoBecaModel extends Model
{
    use SoftDeletes;

    protected $table = "acad_docente_inf_beca";

    protected $dates = ['deleted_at'];

    protected $fillable = [
      'id',
      'cedula',
      'poseeBeca',
      'tipoBeca',
      'valorBeca',
      'tipoFina',
      'realizoPub',
      'nroPub',
      'id_usu_cre',
      'fecha_cre',
      'id_usu_mod',
      'fecha_mod',
    ];
}
