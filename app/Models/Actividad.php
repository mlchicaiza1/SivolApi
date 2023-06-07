<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Actividad
 * @package App\Models
 * @version June 6, 2023, 11:26 pm UTC
 *
 * @property int $id_tipo_estado_seguro
 * @property int $seguro
 * @property string $usuario
 * @property string $ip
 * @property string $data_json
 */
class Actividad extends Model
{


    public $table = 'actividads';




    public $fillable = [
        'id_actividad',
        'id_tipo_estado_seguro',
        'seguro',
        'usuario',
        'ip',
        'data_json'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'usuario' => 'string',
        'ip' => 'string',
        'data_json' => 'array'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ip' => 'creador string text'
    ];


}
