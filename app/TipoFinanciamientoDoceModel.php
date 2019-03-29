<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoFinanciamientoDoceModel extends Model
{
     use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'sene_financiamientobeca_doce';

    protected $fillable = [
        'id','etiqueta',
        'id_usu_cre','fecha_cre',
        'id_usu_mod','fecha_mod'];
}
