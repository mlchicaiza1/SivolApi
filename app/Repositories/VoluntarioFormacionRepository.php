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
        $voluntarioFormacionIdioma = DB::select('CALL cre_sp_agregarvoluntarioformacionidioma(?,?,?,?,?,?,@result)',
            [$data['id_vol'],
            $data['id_tipo_titulo_academico'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            json_encode($data['data_json']),
            ]);
        
        $result = DB::select('SELECT @result as result');

        $resultJson = $result[0]->result;

        return $resultJson;
    }

    public function updateFormacionIdioma($data, $id_voluntario_formacion){
        $voluntarioFormacionIdioma = DB::select('CALL cre_sp_actualizarvoluntarioformacionidioma(?,?,?,?,?,?,@result)',
            [$data['id_vol'],
            $id_voluntario_formacion,
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            json_encode($data['data_json']),
            ]);

        $result = DB::select('SELECT @result as result');

        $resultJson = $result[0]->result;

        return $resultJson;
    }

    public function deleteFormacionIdioma($data, $id_voluntario_formacion){
        $voluntarioFormacionIdioma = DB::select('CALL cre_sp_eliminarvoluntarioformacionidioma(?,?,?,?,?,@result)',
            [$data['id_vol'],
            $id_voluntario_formacion,
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            ]);

        $result = DB::select('SELECT @result as result');

        $resultJson = $result[0]->result;

        return $resultJson;
    }

    public function storeFormacionTitulo($data){
        $voluntarioFormacionIdioma = DB::select('CALL cre_sp_agregarvoluntarioformaciontitulo(?,?,?,?,?,?,@result)',
            [$data['id_vol'],
            $data['id_tipo_titulo_academico'],
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            json_encode($data['data_json']),
            ]);
        
        $result = DB::select('SELECT @result as result');

        $resultJson = $result[0]->result;

        return $resultJson;
    }

    public function updateFormacionTitulo($data, $id_voluntario_formacion){
        $voluntarioFormacionIdioma = DB::select('CALL cre_sp_actualizarvoluntarioformaciontitulo(?,?,?,?,?,?,@result)',
            [$data['id_vol'],
            $id_voluntario_formacion,
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            json_encode($data['data_json']),
            ]);

        $result = DB::select('SELECT @result as result');

        $resultJson = $result[0]->result;

        return $resultJson;
    }

    public function deleteFormacionTitulo($data, $id_voluntario_formacion){
        $voluntarioFormacionIdioma = DB::select('CALL cre_sp_eliminarvoluntarioformaciontitulo(?,?,?,?,?,@result)',
            [$data['id_vol'],
            $id_voluntario_formacion,
            $data['usuario'],
            $data['ip'],
            $data['creador'],
            ]);

        $result = DB::select('SELECT @result as result');

        $resultJson = $result[0]->result;

        return $resultJson;
    }
}
