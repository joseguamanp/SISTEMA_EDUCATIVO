<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles_Usuario extends Model
{
	protected $table = 'roles_usuarios';

    protected $fillable = [
        'id_user', 'id_rol',
    ];

    //public $timestamps = false;
}
