<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{

	use SoftDeletes; //Implementamos 

    protected $dates = ['deleted_at'];

    protected $table = 'rols';

    protected $fillable = [
        'nombre', 'estado','icono',
    ];
}
