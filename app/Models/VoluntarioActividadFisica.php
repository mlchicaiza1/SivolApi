<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class VoluntarioActividadFisica
 * @package App\Models
 * @version June 6, 2023, 9:46 pm UTC
 *
 * @property int $id_tipo_actividad_fisica
 * @property string $usuario
 * @property string $ip
 * @property json $data_json
 * @property int $id_voluntario
 * @property string $frecuencia
 * @property string $descripcion
 */
class VoluntarioActividadFisica extends Model
{


    public $table = 'voluntario_actividad_fisicas';
    



    public $fillable = [
        'id_tipo_actividad_fisica',
        'usuario',
        'ip',
        'creador',
        'data_json',
        'id_voluntario',
        'frecuencia',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'usuario' => 'string',
        'ip' => 'string',
        'creador' => 'string',
        'frecuencia' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];

    
}
