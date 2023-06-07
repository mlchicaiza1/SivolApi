<?php

namespace App\Repositories;

use App\Models\VoluntarioVacuna;
use App\Repositories\BaseRepository;

/**
 * Class VoluntarioVacunaRepository
 * @package App\Repositories
 * @version June 6, 2023, 10:47 pm UTC
*/

class VoluntarioVacunaRepository extends BaseRepository
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
        return VoluntarioVacuna::class;
    }
}
