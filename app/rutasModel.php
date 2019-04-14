<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rutasModel extends Model
{
    protected $table = 'tb_rutas';

    protected $fillable = [
        'id', 'nombre','rutas','posicion','escalon'
    ];
}
