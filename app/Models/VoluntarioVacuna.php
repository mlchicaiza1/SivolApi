<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class VoluntarioVacuna
 * @package App\Models
 * @version June 6, 2023, 10:46 pm UTC
 *
 * @property int $id_tipo_vacuna
 * @property string $usuario
 * @property string $ip
 * @property string $creador
 * @property json $data_json
 * @property int $id_voluntario
 * @property int $num_vacunas
 * @property string $descripcion
 */
class VoluntarioVacuna extends Model
{


    public $table = 'voluntario_vacunas';
    



    public $fillable = [
        'id_tipo_vacuna',
        'usuario',
        'ip',
        'creador',
        'data_json',
        'id_voluntario',
        'num_vacunas',
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
