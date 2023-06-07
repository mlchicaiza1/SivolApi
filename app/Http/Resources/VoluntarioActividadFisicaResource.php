<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VoluntarioActividadFisicaResource extends JsonResource
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
            'id_tipo_actividad_fisica'=> $this->id_tipo_actividad_fisica,
            'usuario'=> $this->usuario,
            'ip'=> $this->ip,
            'creador'=> $this->creador,
            'data_json'=> $this->id_voluntario_dignidad,
            'id_voluntario'=> $this->data_json,
            'frecuencia'=> $this->frecuencia,
            'descripcion'=> $this->descripcion,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
