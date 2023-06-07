<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VoluntarioDignidadesResource extends JsonResource
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
            'id_voluntario_dignidad'=> $this->id_voluntario_dignidad,
            'id_voluntario'=> $this->id_voluntario,
            'id_tipo_dignidad'=> $this->id_tipo_dignidad,
            'ambito_dignidad'=> $this->ambito_dignidad,
            'fecha_inicio'=> $this->fecha_inicio,
            'fecha_fin'=> $this->fecha_fin,
            'fecha_registro'=> $this->fecha_registro,
            'condicion'=> $this->condicion,
            'estado'=> $this->estado,
            'meses_servicio'=> $this->meses_servicio,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
