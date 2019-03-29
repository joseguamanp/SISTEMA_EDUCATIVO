<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class acadEstuInfoBeca extends Model
{
    use SoftDeletes;

	protected $dates = ['deleted_at'];
	
    protected $table = 'acad_est_infbeca';
    protected $fillable = [
        'numero_identificacion',
      'tipo_beca',
      'primera_razon',
      'segunda_razon',
      'tercera_razon',
      'cuarta_razon',
      'quinta_razon',
      'sexta_razon',
      'monto_beca',
      'porcentaje_beca_arancel',
      'porcentaje_beca_manutencion',
      'id_usu_cre',
      'fecha_cre',
      'id_usu_mod',
      'fecha_mod'
    ];


}
