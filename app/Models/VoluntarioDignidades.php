<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class VoluntarioDignidades
 * @package App\Models
 * @version June 6, 2023, 8:43 pm UTC
 *
 * @property int $id_voluntario_dignidad
 * @property int $id_voluntario
 * @property int $id_tipo_dignidad
 * @property string $ambito_dignidad
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $fecha_registro
 * @property string $condicion
 * @property int $estado
 * @property string $meses_servicio
 */
class VoluntarioDignidades extends Model
{


    public $table = 'voluntario_dignidades';
    



    public $fillable = [
        'id_voluntario_dignidad',
        'id_voluntario',
        'id_tipo_dignidad',
        'ambito_dignidad',
        'fecha_inicio',
        'fecha_fin',
        'fecha_registro',
        'condicion',
        'estado',
        'meses_servicio'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ambito_dignidad' => 'string',
        'fecha_inicio' => 'string',
        'fecha_fin' => 'string',
        'fecha_registro' => 'string',
        'condicion' => 'string',
        'meses_servicio' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    
}
