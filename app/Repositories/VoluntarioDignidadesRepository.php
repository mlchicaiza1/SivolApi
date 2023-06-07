<?php

namespace App\Repositories;

use App\Models\VoluntarioDignidades;
use App\Repositories\BaseRepository;

/**
 * Class VoluntarioDignidadesRepository
 * @package App\Repositories
 * @version June 6, 2023, 8:45 pm UTC
*/

class VoluntarioDignidadesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return VoluntarioDignidades::class;
    }
}
