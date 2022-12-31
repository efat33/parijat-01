<?php

namespace App\Http\Controllers\V1;

use App\Models\FactoryOrder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\FactoryOrder\StoreFactoryOrderRequest;
use App\Http\Requests\V1\FactoryOrder\UpdateFactoryOrderRequest;
use App\Http\Resources\V1\FactoryOrder\FactoryOrderAllCollection;
use App\Http\Resources\V1\FactoryOrder\FactoryOrderAllResource;
use App\Http\Resources\V1\FactoryOrder\FactoryOrderSingleResource;
use App\Models\FactoryOrderItem;
use App\Traits\V1\HttpResponses;

class FactoryOrderController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success(new FactoryOrderAllCollection(FactoryOrder::orderBy('order_date', 'desc')->paginate(config('settings.pagination.per_page'), ['id', 'order_date'])));
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
     * @param  \App\Http\Requests\StoreFactoryOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFactoryOrderRequest $request)
    {
        $order = FactoryOrder::create([
            'order_date' => $request->order_date,
        ]);

        // grab the ID of the inserted order
        $order_id = $order->id;

        $r_arr = $request->toArray();

        // insert items into order_items table 
        if (isset($r_arr['items']) && count($r_arr['items']) > 0) {
            $items = array_reduce($r_arr['items'], function ($result, $item) use ($order_id) {
                $item['factory_order_id'] = $order_id;
                $result[] = $item;
                return $result;
            }, array());

            FactoryOrderItem::upsert($items, ['factory_order_id', 'item_id']);
        }

        return $this->success(['id' => $order_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FactoryOrder  $factoryOrder
     * @return \Illuminate\Http\Response
     */
    public function show(FactoryOrder $factoryOrder)
    {
        return $this->success(new FactoryOrderSingleResource($factoryOrder));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FactoryOrder  $factoryOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(FactoryOrder $factoryOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFactoryOrderRequest  $request
     * @param  \App\Models\FactoryOrder  $factoryOrder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFactoryOrderRequest $request, FactoryOrder $factoryOrder)
    {
        $factoryOrder->order_date = $request->order_date;
        $factoryOrder->save();

        // grab the ID of the inserted order
        $order_id = $factoryOrder->id;

        $r_arr = $request->toArray();

        // insert items into order_items table 
        if (isset($r_arr['items']) && count($r_arr['items']) > 0) {
            $items = array_reduce($r_arr['items'], function ($result, $item) use ($order_id) {
                $item['factory_order_id'] = $order_id;
                $result[] = $item;
                return $result;
            }, array());

            FactoryOrderItem::upsert($items, ['factory_order_id', 'item_id']);
        }

        return $this->success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FactoryOrder  $factoryOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(FactoryOrder $factoryOrder)
    {
        $factoryOrder->delete();

        return $this->success();
    }
}
