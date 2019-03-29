<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class AcadPeriodos extends Model
{
    protected $table = 'acad_periodos';
    use SoftDeletes; //Implementamos 
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id',
        'nombre_periodo',
        'nombre_corto',
        'anio_periodo',
        'id_ciclo',
        'fecha_inicio_clases',
        'fecha_fin_clases',
        'fecha_inicio_matricula_ord',
        'fecha_fin_matricula_ord',
        'fecha_inicio_matricula_ext',
        'fecha_fin_matricula_ext',
        'fecha_inicio_matricula_esp',
        'fecha_fin_matricula_esp',
        'id_usu_cre',
        'fecha_cre',
        'id_usu_mod',
        'fecha_mod',
        'deleted_at'
    ];
}
