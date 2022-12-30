<?php

namespace App\Http\Resources\V1\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderRawMaterialArrayResource extends JsonResource
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
            'price' => $this->price,
            'pivot' => new OrderRawMaterialPivotResource($this->pivot)
        ];
    }
}
