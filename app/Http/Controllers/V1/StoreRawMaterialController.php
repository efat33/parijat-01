<?php

namespace App\Http\Controllers\V1;

use App\Models\Store;
use Ramsey\Uuid\Type\Integer;
use App\Models\StoreRawMaterial;
use App\Traits\V1\HttpResponses;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Store\StoreItemResource;
use App\Http\Requests\V1\StoreRawMaterial\StoreStoreRawMaterialRequest;
use App\Http\Requests\V1\StoreRawMaterial\UpdateStoreRawMaterialRequest;
use App\Http\Requests\V1\StoreRawMaterial\BulkStoreStoreRawMaterialRequest;
use App\Http\Resources\V1\Store\StoreRawMaterialResource;

class StoreRawMaterialController extends Controller
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
     * @param  \App\Http\Requests\BulkStoreStoreRawMaterialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BulkStoreStoreRawMaterialRequest $request)
    {
        $r_arr = $request->toArray();

        if (count($r_arr) > 0) {
            StoreRawMaterial::where('store_id', $r_arr[0]['store_id'])->delete();
            // StoreRawMaterial::insert($r_arr);
            StoreRawMaterial::upsert($request->toArray(), ['store_id', 'raw_material_id'], ['serial', 'section']);
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
        $store = new StoreRawMaterialResource(Store::find($id));
        return $this->success($store);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StoreRawMaterial  $storeRawMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreRawMaterial $storeRawMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStoreRawMaterialRequest  $request
     * @param  \App\Models\StoreRawMaterial  $storeRawMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoreRawMaterialRequest $request, StoreRawMaterial $storeRawMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StoreRawMaterial  $storeRawMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoreRawMaterial $storeRawMaterial)
    {
        //
    }
}
