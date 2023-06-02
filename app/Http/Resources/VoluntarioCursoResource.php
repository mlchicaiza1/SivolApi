<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VoluntarioCursoResource extends JsonResource
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
            'id_curso' => $this->id_curso,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'ambito_curso' => $this->ambito_curso,
            'id_tipo_curso' => $this->id_tipo_curso,
            'plataforma_elearning' => $this->plataforma_elearning,
            'descripcion' => $this->descripcion,
            'instructor' => $this->instructor,
            'id_prov_lug' => $this->id_prov_lug,
            'id_ciu_lug' => $this->id_ciu_lug,
            'institucion' => $this->institucion,
            'becado' => $this->becado,
            'tipo_titulo_curso' => $this->tipo_titulo_curso,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
