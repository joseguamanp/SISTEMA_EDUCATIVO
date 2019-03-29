<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ValorMontoBeca extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'sene_valormontobeca';

    protected $fillable = [
       'id', 'valor', 'id_usu_cre', 'id_usu_mod',
    ];
}
