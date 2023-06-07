<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VoluntarioFormacionResource extends JsonResource
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
            'id_tipo_titulo_academico'=> $this->id_tipo_titulo_academico,
            'usuario'=> $this->usuario,
            'ip'=> $this->ip,
            'creador'=> $this->creador,
            'id_voluntario'=> $this->id_voluntario,
            'id_voluntario_formacion'=> $this->id_voluntario_formacion,
            'descripcion'=> $this->descripcion,
            'id_tipo_modalidad_formacion'=> $this->id_tipo_modalidad_formacion,
            'formacion_en_curso'=> $this->formacion_en_curso,
            'nivel_formacion_en_curso'=> $this->nivel_formacion_en_curso,
            'modalidad_formacion_en_curso'=> $this->modalidad_formacion_en_curso,
            'nivel_escrito'=> $this->nivel_escrito,
            'nivel_oral'=> $this->nivel_oral,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
