<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Mitarbeiter extends JsonResource
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
            "id"=>$this->id,
            "firmen_Id"=> $this->firmen_id,
            "vorname"=>$this->vorname,
            "nachname"=> $this->nachname,
            "email"=>$this->email
        ];
    }
}
