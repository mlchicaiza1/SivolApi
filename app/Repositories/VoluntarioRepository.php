<?php

namespace App\Repositories;

use App\Models\Voluntario;
use App\Repositories\BaseRepository;

/**
 * Class VoluntarioRepository
 * @package App\Repositories
 * @version June 2, 2023, 10:16 pm UTC
*/

class VoluntarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_estado_voluntario',
        'usuario',
        'ip',
        'creador'
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
        return Voluntario::class;
    }
}
