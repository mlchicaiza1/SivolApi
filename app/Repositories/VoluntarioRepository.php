<?php

namespace App\Repositories;

use App\Models\Voluntario;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

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

    public function updateStoreProcedure($data, $id)
    {
        $sp = DB::select('exec cre_sp_actualizarvoluntario(?,?,?,?,?)',
            [$data['id_actividad'],$data['id_tipo_estado_seguro'],$data['usuario'],
            $data['ip'],implode(",", $data['data_json'])]);

        return $sp;
    }
}
