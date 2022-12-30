<?php

namespace App\Http\Resources\V1\FactoryOrder;

use App\Http\Resources\V1\Item\ItemResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\Store\StoreItemArrayResource;

class FactoryOrderTemplateResource extends JsonResource
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
            'itemId' => $this->item_id,
            'serial' => $this->serial,
        ];
    }
}
