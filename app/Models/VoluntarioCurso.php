<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class VoluntarioCurso
 * @package App\Models
 * @version June 2, 2023, 10:35 pm UTC
 *
 * @property string $id_curso
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $ambito_curso
 * @property int $id_tipo_curso
 * @property string $plataforma_elearning
 * @property string $descripcion
 * @property string $instructor
 * @property int $id_prov_lug
 * @property int $id_ciu_lug
 * @property string $institucion
 * @property string $becado
 * @property string $tipo_titulo_curso
 */
class VoluntarioCurso extends Model
{


    public $table = 'voluntario_cursos';
    



    public $fillable = [
        'id_curso',
        'fecha_inicio',
        'fecha_fin',
        'ambito_curso',
        'id_tipo_curso',
        'plataforma_elearning',
        'descripcion',
        'instructor',
        'id_prov_lug',
        'id_ciu_lug',
        'institucion',
        'becado',
        'tipo_titulo_curso'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_curso' => 'string',
        'fecha_inicio' => 'string',
        'fecha_fin' => 'string',
        'ambito_curso' => 'string',
        'plataforma_elearning' => 'string',
        'descripcion' => 'string',
        'instructor' => 'string',
        'institucion' => 'string',
        'becado' => 'string',
        'tipo_titulo_curso' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
