<?php

namespace App\Http\Resources\V1\FactoryOrder;

use Illuminate\Http\Resources\Json\JsonResource;

class FactoryOrderItemPivotResource extends JsonResource
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
            'subQuantity' => $this->sub_quantity,
            'totalQuantity' => $this->total_quantity
        ];
    }
}
