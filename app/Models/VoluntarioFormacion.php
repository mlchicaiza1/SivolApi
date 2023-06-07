<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class VoluntarioFormacion
 * @package App\Models
 * @version June 6, 2023, 11:12 pm UTC
 *
 * @property int $id_tipo_titulo_academico
 * @property string $usuario
 * @property string $ip
 * @property string $creador
 * @property json $data_json
 * @property int $id_voluntario
 * @property int $id_voluntario_formacion
 * @property string $descripcion
 * @property int $id_tipo_modalidad_formacion
 * @property int $formacion_en_curso
 * @property int $nivel_formacion_en_curso
 * @property string $modalidad_formacion_en_curso
 * @property string $nivel_escrito
 * @property string $nivel_oral
 */
class VoluntarioFormacion extends Model
{


    public $table = 'voluntario_formacions';
    



    public $fillable = [
        'id_tipo_titulo_academico',
        'usuario',
        'ip',
        'creador',
        'data_json',
        'id_voluntario',
        'id_voluntario_formacion',
        'descripcion',
        'id_tipo_modalidad_formacion',
        'formacion_en_curso',
        'nivel_formacion_en_curso',
        'modalidad_formacion_en_curso',
        'nivel_escrito',
        'nivel_oral'
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
        'descripcion' => 'string',
        'modalidad_formacion_en_curso' => 'string',
        'nivel_escrito' => 'string',
        'nivel_oral' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
