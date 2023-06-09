<?php

namespace App\Repositories;

use App\Models\VoluntarioActividadFisica;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

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

    public function storeActividadFisica($data){
        $voluntarioActividadFisica = DB::select('CALL cre_sp_agregarvoluntarioactividadfisica(?,?,?,?,?)',
            [$data['id_tipo_actividad_fisica'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            implode(",",$data['data_json'])
            ]);

        return $voluntarioActividadFisica;
    }

    public function updateActividadFisica($data, $id){
        $voluntarioActividadFisica = DB::select('CALL cre_sp_actualizarvoluntarioactividadfisica(?,?,?,?,?)',
            [$data['id_tipo_actividad_fisica'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            implode(",",$data['data_json'])
            ]);

        return $voluntarioActividadFisica;
    }

    public function deleteActividadFisica($id, $data){
        $voluntarioActividadFisica = DB::select('CALL cre_sp_eliminarvoluntarioactividadfisica(?,?,?,?)',
            [$data['id_tipo_actividad_fisica'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            ]);

        return $voluntarioActividadFisica;
    }
    
}
