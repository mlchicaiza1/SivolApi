<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VoluntarioDiscapacidadResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id_tipo_discapacidad'=> $this->id_tipo_discapacidad,
            'usuario'=> $this->usuario,
            'ip'=> $this->ip,
            'creador'=> $this->creador,
            'id_voluntario'=> $this->id_voluntario,
            'descripcion'=> $this->descripcion,
            'porcentaje'=> $this->porcentaje,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
