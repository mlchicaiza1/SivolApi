<?php

namespace App\Repositories;

use App\Models\VoluntarioActividadFisica;
use App\Repositories\BaseRepository;

/**
 * Class VoluntarioActividadFisicaRepository
 * @package App\Repositories
 * @version June 6, 2023, 9:53 pm UTC
*/

class VoluntarioActividadFisicaRepository extends BaseRepository
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
        return VoluntarioActividadFisica::class;
    }
    
}
