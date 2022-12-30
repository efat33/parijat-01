<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'store_id',
        'subtotal',
        'commission_1',
        'commission_2',
        'total',
    ];

    /**
     * Delete related tables entries when Order is deleted 
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($order) {
            $order->orderItems()->delete();
            $order->orderRawMaterial()->delete();
        });
    }

    /**
     * The associated store details
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * The items that belong to the store.
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'order_items', 'order_id', 'item_id')->withPivot('quantity_ija', 'quantity_aj', 'price');
    }

    /**
     * The raw materials that belong to the store.
     */
    public function rawMaterials()
    {
        return $this->belongsToMany(RawMaterial::class, 'order_raw_materials', 'order_id', 'raw_material_id')->withPivot('quantity_aj', 'price');
    }

    /**
     * The order items that belong to the order.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    /**
     * The order items that belong to the order.
     */
    public function orderRawMaterial()
    {
        return $this->hasMany(OrderRawMaterial::class, 'order_id');
    }
}
