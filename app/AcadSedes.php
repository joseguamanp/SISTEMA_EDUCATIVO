<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcadSedes extends Model
{
	use SoftDeletes;

	protected $table = 'acad_sedes';
	protected $dates = ['delete_at'];
	protected $fillable = [
		'id',
		'nombre_sede',
		'id_provincia',
		'id_canton',
		'observacion',
		'id_usu_cre',
		'id_usu_mod',
	];

}
