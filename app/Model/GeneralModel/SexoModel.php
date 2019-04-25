<?php

namespace App\Model\GeneralModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SexoModel extends Model
{
  protected $table = 'sene_sexoid';
  use SoftDeletes; //Implementamos

  protected $dates = ['deleted_at'];

  protected $fillable = [
    'id',
    'etiqueta',
    'id_usu_cre',
    'fecha_cre',
    'id_usu_mod',
    'fecha_mod'
  ];
}
