<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Voluntario
 * @package App\Models
 * @version June 2, 2023, 10:16 pm UTC
 *
 * @property int $id_estado_voluntario
 * @property string $usuario
 * @property string $ip
 * @property string $creador
 */
class Voluntario extends Model
{


    public $table = 'voluntarios';
    



    public $fillable = [
        'id_estado_voluntario',
        'usuario',
        'ip',
        'creador'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'usuario' => 'string',
        'ip' => 'string',
        'creador' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'creador' => 'data_json string text'
    ];

    
}
