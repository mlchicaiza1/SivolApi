<?php

namespace App\Repositories;

use App\Models\VoluntarioFormacion;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class VoluntarioFormacionRepository
 * @package App\Repositories
 * @version June 6, 2023, 11:12 pm UTC
*/

class VoluntarioFormacionRepository extends BaseRepository
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
        return VoluntarioFormacion::class;
    }

    public function storeFormacionIdioma($data){
        $voluntarioFormacionIdioma = DB::select('CALL cre_sp_agregarvoluntarioformacionidioma(?,?,?,?,?)',
            [$data['id_tipo_titulo_academico'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            implode(",",$data['data_json'])
            ]);

        return $voluntarioFormacionIdioma;
    }

    public function updateFormacionIdioma($data,$id){
        $voluntarioFormacionIdioma = DB::select('CALL cre_sp_actualizarvoluntarioformacionidioma(?,?,?,?,?)',
            [$data['id_voluntario_formacion'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            implode(",",$data['data_json'])
            ]);

        return $voluntarioFormacionIdioma;
    }
}
