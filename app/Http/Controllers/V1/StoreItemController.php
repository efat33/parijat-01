<?php

namespace App\Http\Controllers\V1;

use App\Models\Store;
use App\Models\StoreItem;
use Ramsey\Uuid\Type\Integer;
use App\Traits\V1\HttpResponses;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Store\StoreResource;
use App\Http\Requests\V1\StoreItem\StoreStoreItemRequest;
use App\Http\Requests\V1\StoreItem\UpdateStoreItemRequest;
use App\Http\Requests\V1\StoreItem\BulkStoreStoreItemRequest;
use App\Http\Resources\V1\Store\StoreItemResource;

class StoreItemController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BulkStoreStoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BulkStoreStoreItemRequest $request)
    {
        $r_arr = $request->toArray();

        if (count($r_arr) > 0) {
            StoreItem::where('store_id', $r_arr[0]['store_id'])->delete();
            StoreItem::upsert($r_arr, ['store_id', 'item_id'], ['serial', 'section']);
        }



        return $this->success();
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store = new StoreItemResource(Store::find($id));
        return $this->success($store);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StoreItem  $storeItem
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreItem $storeItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStoreItemRequest  $request
     * @param  \App\Models\StoreItem  $storeItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoreItemRequest $request, StoreItem $storeItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StoreItem  $storeItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoreItem $storeItem)
    {
        //
    }
}
