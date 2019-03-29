<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ValorMontoCredito extends Model
{
    use SoftDeletes;
    protected $table = 'valormontocredito';

    protected $fillable = [
      'id',
      'etiqueta',
      'id_usu_cre',
      'fecha_cre',
      'id_usu_mod',
      'fecha_mod'

    ];
}
