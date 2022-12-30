<?php

namespace App\Http\Resources\V1\FactoryOrder;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\Store\StoreItemPivotResource;

class FactoryOrderItemArrayResource extends JsonResource
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
            'pivot' => new FactoryOrderItemPivotResource($this->pivot)
        ];
    }
}
