<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcadMallasMateriasModel extends Model
{
    use SoftDeletes;

	protected $dates = ['deleted_at'];
	
    protected $table = 'acad_mallas_materias';
    protected $fillable = [
      'id',
      'id_malla',
      'id_materia',
      'id_nivel',
      'optativa_sn',
      'num_horas_semanas',
      'num_horas_totales',
      'num_creditos',
      'observacion',
      'id_usu_cre',
      'id_usu_mod'
    ];
}
