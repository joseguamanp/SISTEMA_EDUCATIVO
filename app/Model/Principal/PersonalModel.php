<?php

namespace App\Model\Principal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonalModel extends Model
{
    
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    protected $table = 'personal';

    protected $fillable = [
        'id',
      'nombre_primero',
      'nombre_segundo',   
      'apellido_primero',
      'apellido_segundo', 
      'foto',
      'cedula',
      'telefono',
      'email',
      'usuario_mod',
      'usuario_cre',
      'fecha_cre',
      'fecha_mod',
      'cargo_id',
      'fecha_nacimiento'
    ];
}
