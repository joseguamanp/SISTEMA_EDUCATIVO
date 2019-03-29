<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provincias extends Model
{
    
    protected $table = 'sene_provincias';
    use SoftDeletes; //Implementamos 

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'etiqueta',
        'id_pais',
        'id_usu_cre',
    ];
}
