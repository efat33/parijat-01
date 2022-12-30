<?php

namespace App\Http\Controllers\V1;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Order\StoreOrderRequest;
use App\Http\Requests\V1\Order\UpdateOrderRequest;
use App\Http\Resources\V1\Order\OrderAllCollection;
use App\Http\Resources\V1\Order\OrderAllResource;
use App\Http\Resources\V1\Order\OrderSingleResource;
use App\Models\OrderItem;
use App\Models\OrderRawMaterial;
use App\Traits\V1\HttpResponses;

class OrderController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $store = $request->query('store');
        $date = $request->query('date');

        $orderQuery = Order::orderBy('id', 'desc');

        if ($date) $orderQuery->whereDate('created_at', '=', $date);

        if ($store) {
            $orderQuery->whereHas('store', function ($q) {
                $q->where('id', 3);
            });
        }

        $orders = $orderQuery->paginate(config('settings.pagination.per_page'), ['store_id', 'subtotal', 'commission_1', 'commission_2', 'total', 'created_at']);

        return $this->success(new OrderAllCollection($orders));
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
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $order = Order::create([
            'store_id' => $request->store_id,
            'subtotal' => $request->subtotal,
            'commission_1' => $request->commission_1,
            'commission_2' => $request->commission_2,
            'total' => $request->total
        ]);

        // grab the ID of the inserted order
        $order_id = $order->id;

        $r_arr = $request->toArray();

        // insert items into order_items table 
        if (isset($r_arr['items']) && count($r_arr['items']) > 0) {
            $items = array_reduce($r_arr['items'], function ($result, $item) use ($order_id) {
                $item['order_id'] = $order_id;
                $result[] = $item;
                return $result;
            }, array());

            OrderItem::upsert($items, ['order_id', 'item_id']);
        }

        // insert raw material into order_raw_materials table 
        if (isset($r_arr['raw_materials']) && count($r_arr['raw_materials']) > 0) {
            $raw_materials = array_reduce($r_arr['raw_materials'], function ($result, $item) use ($order_id) {
                $item['order_id'] = $order_id;
                $result[] = $item;
                return $result;
            }, array());

            OrderRawMaterial::upsert($raw_materials, ['order_id', 'raw_material_id']);
        }

        return $this->success();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return $this->success(new OrderSingleResource($order));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->store_id = $request->store_id;
        $order->subtotal = $request->subtotal;
        $order->commission_1 = $request->commission_1;
        $order->commission_2 = $request->commission_2;
        $order->total = $request->total;
        $order->save();

        // grab the ID of the inserted order
        $order_id = $order->id;

        $r_arr = $request->toArray();

        // insert items into order_items table 
        if (isset($r_arr['items']) && count($r_arr['items']) > 0) {
            $items = array_reduce($r_arr['items'], function ($result, $item) use ($order_id) {
                $item['order_id'] = $order_id;
                $result[] = $item;
                return $result;
            }, array());

            OrderItem::upsert($items, ['order_id', 'item_id']);
        }

        // insert raw material into order_raw_materials table 
        if (isset($r_arr['raw_materials']) && count($r_arr['raw_materials']) > 0) {
            $raw_materials = array_reduce($r_arr['raw_materials'], function ($result, $item) use ($order_id) {
                $item['order_id'] = $order_id;
                $result[] = $item;
                return $result;
            }, array());

            OrderRawMaterial::upsert($raw_materials, ['order_id', 'raw_material_id']);
        }

        return $this->success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return $this->success();
    }
}
