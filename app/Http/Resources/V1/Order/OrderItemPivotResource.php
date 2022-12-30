<?php

namespace App\Http\Resources\V1\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemPivotResource extends JsonResource
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
            'quantityIja' => $this->quantity_ija,
            'quantityAj' => $this->quantity_aj,
            'price' => $this->price
        ];
    }
}
