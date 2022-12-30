<?php

namespace App\Http\Controllers\V1;

use App\Models\Store;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Store\StoreStoreRequest;
use App\Http\Requests\V1\Store\UpdateStoreRequest;
use App\Http\Resources\V1\Store\StoreResource;
use App\Traits\V1\HttpResponses;

class StoreController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success(StoreResource::collection(Store::all('id', 'name', 'address', 'type', 'commission_1', 'commission_2')));
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
     * @param  \App\Http\Requests\StoreStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStoreRequest $request)
    {
        $store = Store::create([
            'name' => $request->name,
            'address' => $request->address,
            'type' => $request->type,
            'commission_1' => $request->commission_1,
            'commission_2' => $request->commission_2
        ]);

        return $this->success($store);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        // echo '<pre>';
        // print_r($store->items);
        // exit();
        return $this->success(new StoreResource($store));
        // return $this->success($store);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStoreRequest  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        $store->name = $request->name;
        $store->address = $request->address;
        $store->type = $request->type;
        $store->commission_1 = $request->commission_1;
        $store->commission_2 = $request->commission_2;

        $store->save();

        return $this->success($store);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $store->delete();

        return $this->success();
    }
}
