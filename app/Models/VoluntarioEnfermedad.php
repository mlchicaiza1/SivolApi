<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class VoluntarioEnfermedad
 * @package App\Models
 * @version June 7, 2023, 2:51 am UTC
 *
 * @property int $id
 */
class VoluntarioEnfermedad extends Model
{


    public $table = 'voluntario_enfermedads';
    



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
