<?php

namespace App\Repositories;

use App\Models\VoluntarioDiscapacidad;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

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

    public function storeDiscapacidad($data){
        $voluntarioDiscapacidad = DB::select('CALL cre_sp_agregarvoluntariodiscapacidad(?,?,?,?,?,?,@result)',
            [$data['id_vol'],
            $data['id_tipo_discapacidad'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            json_encode($data['data_json']),
            ]);

        $result = DB::select('SELECT @result as result');

        $resultJson = $result[0]->result;

        return $resultJson;
    }

    public function updateDiscapacidad($data, $id_vol){
        $voluntarioDiscapacidad = DB::select('CALL cre_sp_actualizarvoluntariodiscapacidad(?,?,?,?,?,?,@result)',
            [$id_vol,
            $data['id_tipo_discapacidad'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            json_encode($data['data_json']),
            ]);

        $result = DB::select('SELECT @result as result');

        $resultJson = $result[0]->result;

        return $resultJson;
    }

    public function deleteDiscapacidad($data, $id_vol){
        $voluntarioDiscapacidad = DB::select('CALL cre_sp_eliminarvoluntariodiscapacidad(?,?,?,?,?,@result)',
            [$id_vol,
            $data['id_tipo_discapacidad'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            ]);

        $result = DB::select('SELECT @result as result');

        $resultJson = $result[0]->result;

        return $resultJson;
    }

}
