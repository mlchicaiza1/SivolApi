<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class VoluntarioSituacionLaboral
 * @package App\Models
 * @version June 7, 2023, 2:59 am UTC
 *
 * @property int $id
 */
class VoluntarioSituacionLaboral extends Model
{


    public $table = 'voluntario_situacion_laborals';
    



    public $fillable = [
        'id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
