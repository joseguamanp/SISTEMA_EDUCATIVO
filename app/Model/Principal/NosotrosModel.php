<?php

namespace App\Model\Principal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NosotrosModel extends Model
{
  use SoftDeletes;
  protected $table = 'prin_nosotros';
  protected $primaryKey = 'id';
  protected $dates = ['deleted_at'];

  protected $fillable = [
    'id',
    'titulo',
    'descripcion',
    'id_prin_nosotros',
    'id_usu_cre',
    'fecha_cre',
    'id_usu_mod',
    'fecha_mod'
  ];
}
