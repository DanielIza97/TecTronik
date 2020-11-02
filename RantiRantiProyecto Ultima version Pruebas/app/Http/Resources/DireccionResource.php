<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DireccionResource extends JsonResource
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
            'principal'=>$this->calleprincipal,
            'secundaria'=>$this->callesecundaria,
            'imagen'=>$this->imagendireccion,
            'numero'=>$this->numerodecasa,
        ];
    }
}
