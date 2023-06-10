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
        $voluntarioActividadFisica = DB::select('CALL cre_sp_agregarvoluntarioactividadfisica(?,?,?,?,?,?,@result)',
            [$data['id_vol'],
            $data['id_tipo_actividad_fisica'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            json_encode($data['data_json']),
            ]);

        $result = DB::select('SELECT @result as result');

        return $result;
    }

    public function updateActividadFisica($data, $id_vol){
        $voluntarioActividadFisica = DB::select('CALL cre_sp_actualizarvoluntarioactividadfisica(?,?,?,?,?,?,@result)',
            [$id_vol,
            $data['id_tipo_actividad_fisica'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            json_encode($data['data_json']),
            ]);

        $result = DB::select('SELECT @result as result');

        return $result;
    }

    public function deleteActividadFisica($data, $id_vol){
        $voluntarioActividadFisica = DB::select('CALL cre_sp_eliminarvoluntarioactividadfisica(?,?,?,?,?,@result)',
            [$id_vol,
            $data['id_tipo_actividad_fisica'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            ]);

        $result = DB::select('SELECT @result as result');

        return $result;
    }
    
}
