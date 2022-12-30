<?php

namespace App\Http\Resources\V1\Store;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreRawMaterialPivotResource extends JsonResource
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
            'serial' => $this->serial,
            'section' => $this->section
        ];
    }
}
