<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class InformacionGlobalModel extends Model
{
    use SoftDeletes;

	protected $dates = ['deleted_at'];
	
    protected $table = 'acad_est_infacademica';

    protected $fillable = [
      'tipocolegio',
      'tipobachillerato',
      'aniograduacion',
      'tipotitulosuperior',
      'especifiquetitulo',
      'fechainicio',
      'fechamatricula',
      'tipomatricula',
      'periodo',
      'anioperiodo',
      'nivelacademico',
      'paralelo',
      'nombrecarrera',
      'titulocarrera',
      //'tipocarrera',
      'modalidadcarrera',
      'jordanadacarrera',
      'repetidocarrera',
      'perdiogratuidad',
      'numero_identificacion',
    ];
}
