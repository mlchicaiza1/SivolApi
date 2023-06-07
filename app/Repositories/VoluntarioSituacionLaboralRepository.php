<?php

namespace App\Repositories;

use App\Models\VoluntarioSituacionLaboral;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class VoluntarioSituacionLaboralRepository
 * @package App\Repositories
 * @version June 7, 2023, 2:59 am UTC
*/

class VoluntarioSituacionLaboralRepository extends BaseRepository
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
        return VoluntarioSituacionLaboral::class;
    }

    public function updateStoreProcedure($data, $id)
    {
        $sp = DB::select('exec cre_sp_actualizarvoluntariosituacionlaboral(?,?,?,?,?)',
            [$data['id_tipo_situacion_laboral'],$data['usuario'],$data['ip'],
            $data['creador'],implode(",", $data['data_json'])]);
        return $sp;
    }
}
