<?php

namespace App\Repositories;

use App\Models\VoluntarioDiscapacidad;
use App\Repositories\BaseRepository;

/**
 * Class VoluntarioDiscapacidadRepository
 * @package App\Repositories
 * @version June 6, 2023, 10:24 pm UTC
*/

class VoluntarioDiscapacidadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return VoluntarioDiscapacidad::class;
    }
}
