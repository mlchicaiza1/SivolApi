<?php

namespace App\Repositories;

use App\Models\Actividad;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class ActividadRepository
 * @package App\Repositories
 * @version June 6, 2023, 11:26 pm UTC
*/

class ActividadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_tipo_estado_seguro',
        'seguro',
        'usuario',
        'ip',
        'data_json'
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
        return Actividad::class;
    }

    public function updateStoreProcedure($data, $id)
    {
        $sp = DB::select('exec cre_sp_actualizaractividad(?,?,?,?,?)',
            [$data['id_actividad'],$data['id_tipo_estado_seguro'],$data['usuario'],
            $data['ip'],implode(",", $data['data_json'])]);

        return $sp;
    }
}
