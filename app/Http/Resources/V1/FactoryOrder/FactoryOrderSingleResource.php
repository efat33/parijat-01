<?php

namespace App\Http\Resources\V1\FactoryOrder;

use Illuminate\Http\Resources\Json\JsonResource;

class FactoryOrderSingleResource extends JsonResource
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
            'orderDate' => $this->order_date,
            'items' => FactoryOrderItemArrayResource::collection($this->items),
        ];
    }
}
