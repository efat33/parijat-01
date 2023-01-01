<?php

namespace App\Http\Resources\V1\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderChawkbazarArrayResource extends JsonResource
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
            'itemName' => $this->item_name,
            'quantity' => $this->quantity_aj,
            'price' => $this->price,
            'serial' => $this->serial,
        ];
    }
}
