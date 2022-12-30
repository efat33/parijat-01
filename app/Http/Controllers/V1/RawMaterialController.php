<?php

namespace App\Http\Controllers\V1;

use App\Models\RawMaterial;
use App\Traits\V1\HttpResponses;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\RawMaterial\RawMaterialResource;
use App\Http\Requests\V1\RawMaterial\StoreRawMaterialRequest;
use App\Http\Requests\V1\RawMaterial\UpdateRawMaterialRequest;

class RawMaterialController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success(RawMaterialResource::collection(RawMaterial::all('id', 'name', 'price')));
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
     * @param  \App\Http\Requests\StoreRawMaterialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRawMaterialRequest $request)
    {
        $rawMaterial = RawMaterial::create([
            'name' => $request->name,
            'price' => $request->price
        ]);

        return $this->success($rawMaterial);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RawMaterial  $rawMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(RawMaterial $rawMaterial)
    {
        return $this->success(new RawMaterialResource($rawMaterial));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RawMaterial  $rawMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(RawMaterial $rawMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRawMaterialRequest  $request
     * @param  \App\Models\RawMaterial  $rawMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRawMaterialRequest $request, RawMaterial $rawMaterial)
    {
        $rawMaterial->name = $request->name;
        $rawMaterial->price = $request->price;

        $rawMaterial->save();

        return $this->success($rawMaterial);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RawMaterial  $rawMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(RawMaterial $rawMaterial)
    {
        $rawMaterial->delete();

        return $this->success();
    }
}
