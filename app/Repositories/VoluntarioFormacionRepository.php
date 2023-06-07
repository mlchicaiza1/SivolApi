<?php

namespace App\Repositories;

use App\Models\VoluntarioFormacion;
use App\Repositories\BaseRepository;

/**
 * Class VoluntarioFormacionRepository
 * @package App\Repositories
 * @version June 6, 2023, 11:12 pm UTC
*/

class VoluntarioFormacionRepository extends BaseRepository
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
        return VoluntarioFormacion::class;
    }
}
