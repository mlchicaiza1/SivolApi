<?php

namespace App\Repositories;

use App\Models\VoluntarioVacuna;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

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

    public function storeVacuna($data){
        $voluntarioVacuna = DB::select('CALL cre_sp_agregarvoluntariovacuna(?,?,?,?,?,?,@result)',
            [$data['id_vol'],
            $data['id_tipo_vacuna'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            json_encode($data['data_json']),
            ]);

        $result = DB::select('SELECT @result as result');

        $resultJson = $result[0]->result;

        return $resultJson;
    }

    public function updateVacuna($data, $id_vol){
        $voluntarioVacuna = DB::select('CALL cre_sp_actualizarvoluntariovacuna(?,?,?,?,?,?,@result)',
            [$id_vol,
            $data['id_tipo_vacuna'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            json_encode($data['data_json']),
            ]);

        $result = DB::select('SELECT @result as result');

        $resultJson = $result[0]->result;

        return $resultJson;
    }

    public function deleteVacuna($data, $id_vol){
        $voluntarioVacuna = DB::select('CALL cre_sp_eliminarvoluntariovacuna(?,?,?,?,?,@result)',
            [$id_vol,
            $data['id_tipo_vacuna'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            ]);

        $result = DB::select('SELECT @result as result');

        $resultJson = $result[0]->result;

        return $resultJson;
    }
    
}
