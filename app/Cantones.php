<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cantones extends Model
{
    protected $table = 'sene_cantones';
    use SoftDeletes; //Implementamos 

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'etiqueta',
        'id_provincia',
        'id_usu_cre',
    ];
}
