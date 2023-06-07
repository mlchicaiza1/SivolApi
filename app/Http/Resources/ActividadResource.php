<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActividadResource extends JsonResource
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
            'id_tipo_estado_seguro' => $this->id_tipo_estado_seguro,
            'seguro' => $this->seguro,
            'usuario' => $this->usuario,
            'ip' => $this->ip,
            'data_json' => $this->data_json,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
