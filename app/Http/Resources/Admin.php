<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Admin extends JsonResource
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
            "vorname"=>$this->vorname,
            "nachname"=>$this->nachname,
            "email"=>$this->email,
            "password"=>$this->password

        ];
    }
}
