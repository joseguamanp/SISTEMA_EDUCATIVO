<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class opcione extends Model
{
    protected $table = 'opciones';
    use SoftDeletes; //Implementamos 

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre_opcion', 'estado','id_rol','url'
    ];
 	
}
