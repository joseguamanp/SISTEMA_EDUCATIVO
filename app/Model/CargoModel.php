<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CargoModel extends Model
{
    use SoftDeletes; //Implementamos 

    protected $dates = ['deleted_at'];

    protected $table = 'cargo';

    protected $fillable = [
        'etiqueta'
    ];
}
