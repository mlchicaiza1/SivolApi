<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VoluntarioVacunaResource extends JsonResource
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
            'id_tipo_vacuna'=> $this->id_tipo_vacuna,
            'usuario'=> $this->usuario,
            'ip'=> $this->ip,
            'creador'=> $this->creador,
            'id_voluntario'=> $this->id_voluntario,
            'num_vacunas'=> $this->num_vacunas,
            'descripcion'=> $this->descripcion,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
