<?php

namespace App\Http\Controllers\V1;

use App\Enums\StoreType;
use App\Models\Item;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Item\StoreItemRequest;
use App\Http\Requests\V1\Item\UpdateItemRequest;
use App\Http\Resources\V1\Item\ItemCollection;
use App\Http\Resources\V1\Item\ItemResource;
use App\Traits\V1\HttpResponses;

class ItemController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success(new ItemCollection(Item::all('id', 'name', 'price')));
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
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        $item = Item::create([
            'name' => $request->name,
            'price' => $request->price
        ]);

        return $this->success($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return $this->success(new ItemResource($item));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->name = $request->name;
        $item->price = $request->price;

        $item->save();

        return $this->success($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return $this->success();
    }
}
