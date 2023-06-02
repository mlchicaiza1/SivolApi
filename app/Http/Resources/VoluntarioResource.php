<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VoluntarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id_estado_voluntario' => $this->id_estado_voluntario,
            'usuario' => $this->usuario,
            'ip' => $this->ip,
            'creador' => $this->creador,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
