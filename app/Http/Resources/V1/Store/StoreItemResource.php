<?php

namespace App\Http\Resources\V1\Store;

use App\Http\Resources\V1\Item\ItemResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\Store\StoreItemArrayResource;

class StoreItemResource extends JsonResource
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
            'address' => $this->address,
            'type' => $this->type,
            'items' => StoreItemArrayResource::collection($this->items),
        ];
    }
}
