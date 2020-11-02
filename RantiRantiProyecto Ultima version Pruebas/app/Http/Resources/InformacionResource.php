<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InformacionResource extends JsonResource
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
            'cedula'=>$this->idcedulacliente,
            'telefono'=>$this->telefono,
            'nombre'=>$this->nombrecliente,
            'genero'=>$this->generocliente
        ];
    }
}
