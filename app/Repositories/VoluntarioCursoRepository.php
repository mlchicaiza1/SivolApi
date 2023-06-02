<?php

namespace App\Repositories;

use App\Models\VoluntarioCurso;
use App\Repositories\BaseRepository;

/**
 * Class VoluntarioCursoRepository
 * @package App\Repositories
 * @version June 2, 2023, 10:35 pm UTC
*/

class VoluntarioCursoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return VoluntarioCurso::class;
    }
}
