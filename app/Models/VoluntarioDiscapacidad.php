<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class VoluntarioDiscapacidad
 * @package App\Models
 * @version June 6, 2023, 10:22 pm UTC
 *
 * @property int $id_tipo_discapacidad
 * @property string $usuario
 * @property string $ip
 * @property string $creador
 * @property int $id_voluntario
 * @property string $descripcion
 * @property int $porcentaje
 */
class VoluntarioDiscapacidad extends Model
{


    public $table = 'voluntario_discapacidads';
    



    public $fillable = [
        'id_tipo_discapacidad',
        'usuario',
        'ip',
        'creador',
        'id_voluntario',
        'descripcion',
        'porcentaje'
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
