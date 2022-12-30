<?php

namespace App\Http\Resources\V1\Order;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderAllCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'currentPage' => $this->currentPage(),
            'perPage' => $this->perPage(),
            'from' => $this->firstItem(),
            'to' => $this->lastItem(),
            'lastPage' => $this->lastPage(),
            'previousPageUrl' => $this->previousPageUrl(),
            'nextPageUrl' => $this->nextPageUrl(),
            'total' => $this->total(),
        ];
    }
}
