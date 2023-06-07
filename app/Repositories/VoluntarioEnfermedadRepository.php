<?php

namespace App\Repositories;

use App\Models\VoluntarioEnfermedad;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class VoluntarioEnfermedadRepository
 * @package App\Repositories
 * @version June 7, 2023, 2:51 am UTC
*/

class VoluntarioEnfermedadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id'
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
        return VoluntarioEnfermedad::class;
    }

    public function updateStoreProcedure($data, $id)
    {
        $sp = DB::select('exec cre_sp_actualizarvoluntarioenfermedad(?,?,?,?,?)',
            [$data['id_tipo_enfermedad '],$data['usuario'],$data['ip '],
            $data['creador'],implode(",", $data['data_json'])]);

        return $sp;
    }
}
