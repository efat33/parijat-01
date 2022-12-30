<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFactoryOrderItemRequest;
use App\Http\Requests\UpdateFactoryOrderItemRequest;
use App\Models\FactoryOrderItem;

class FactoryOrderItemController extends Controller
{
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
     * @param  \App\Http\Requests\StoreFactoryOrderItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFactoryOrderItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FactoryOrderItem  $factoryOrderItem
     * @return \Illuminate\Http\Response
     */
    public function show(FactoryOrderItem $factoryOrderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FactoryOrderItem  $factoryOrderItem
     * @return \Illuminate\Http\Response
     */
    public function edit(FactoryOrderItem $factoryOrderItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFactoryOrderItemRequest  $request
     * @param  \App\Models\FactoryOrderItem  $factoryOrderItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFactoryOrderItemRequest $request, FactoryOrderItem $factoryOrderItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FactoryOrderItem  $factoryOrderItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(FactoryOrderItem $factoryOrderItem)
    {
        //
    }
}
