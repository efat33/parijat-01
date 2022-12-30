<?php

namespace App\Http\Resources\V1\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderRawMaterialPivotResource extends JsonResource
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
            'quantityAj' => $this->quantity_aj,
            'price' => $this->price
        ];
    }
}
