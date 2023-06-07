<?php

namespace App\Http\Requests\API;

use App\Models\VoluntarioEnfermedad;
use InfyOm\Generator\Request\APIRequest;

class UpdateVoluntarioEnfermedadAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = VoluntarioEnfermedad::$rules;
        
        return $rules;
    }
}
