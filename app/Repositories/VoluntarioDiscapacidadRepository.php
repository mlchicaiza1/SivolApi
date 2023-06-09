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
        $voluntarioDiscapacidad = DB::select('CALL cre_sp_agregarvoluntariodiscapacidad(?,?,?,?,?)',
            [$data['id_tipo_discapacidad'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            implode(",",$data['data_json'])
            ]);

        return $voluntarioDiscapacidad;
    }

    public function updateDiscapacidad($data,$id){
        $voluntarioDiscapacidad = DB::select('CALL cre_sp_actualizarvoluntariodiscapacidad(?,?,?,?,?)',
            [$data['id_tipo_discapacidad'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            implode(",",$data['data_json'])
            ]);

        return $voluntarioDiscapacidad;
    }

    public function deleteDiscapacidad($id, $data){
        $voluntarioDiscapacidad = DB::select('CALL cre_sp_eliminarvoluntariodiscapacidad(?,?,?,?)',
            [$data['id_tipo_discapacidad'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            ]);

        return $voluntarioDiscapacidad;
    }

}
