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
        $voluntarioVacuna = DB::select('CALL cre_sp_agregarvoluntariovacuna(?,?,?,?,?)',
            [$data['id_tipo_vacuna'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            implode(",",$data['data_json'])
            ]);

        return $voluntarioVacuna;
    }

    public function updateVacuna($data, $id){
        $voluntarioVacuna = DB::select('CALL cre_sp_actualizarvoluntariovacuna(?,?,?,?,?)',
            [$data['id_tipo_vacuna'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            implode(",",$data['data_json'])
            ]);

        return $voluntarioVacuna;
    }

    public function deleteVacuna($id, $data){
        $voluntarioVacuna = DB::select('CALL cre_sp_eliminarvoluntariovacuna(?,?,?,?)',
            [$data['id_tipo_vacuna'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            ]);

        return $voluntarioVacuna;
    }
    
}
