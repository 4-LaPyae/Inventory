<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplierResource extends JsonResource
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
            "name"=>$this->name,
            "phone"=>$this->phone,
            "email"=>$this->email,
            "address"=>$this->address,
            "date"=>$this->created_at->format('d M Y')
        ];
    }
}
