<?php

namespace App\Http\Resources\V1\Store;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\Store\StoreRawMaterialArrayResource;

class StoreRawMaterialResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'type' => $this->type,
            'rawMaterials' => StoreRawMaterialArrayResource::collection($this->rawMaterials),
        ];
    }
}
