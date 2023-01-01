<?php

namespace App\Http\Resources\V1\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderSingleResource extends JsonResource
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
            'subtotal' => $this->subtotal,
            'commission_1' => $this->commission_1,
            'commission_2' => $this->commission_2,
            'total' => $this->total,
            'orderDate' => $this->created_at,
            'store' => new OrderAllStoreResource($this->store),
            'items' => OrderItemArrayResource::collection($this->items),
            'rawMaterials' => OrderRawMaterialArrayResource::collection($this->rawMaterials),
            'chawkbazarItems' => OrderChawkbazarArrayResource::collection($this->chawkbazarItems),
        ];
    }
}
