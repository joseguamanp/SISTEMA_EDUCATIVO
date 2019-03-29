<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcadParaleloPeriodo extends Model
{
    use SoftDeletes;

	protected $table = 'acad_paralelos_x_periodo';

	protected $dates = ['delete_at'];

	protected $fillable = [

		'id',
		'id_para_sede_jor_car',
		'id_periodo',
		'id_usu_cre',
		'id_usu_mod',
	];
}
