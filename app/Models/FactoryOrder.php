<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactoryOrder extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['order_date'];

    /**
     * Delete related tables entries when FactoryOrder is deleted 
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($factoryOrder) {
            $factoryOrder->factoryOrderItems()->delete();
        });
    }

    /**
     * The items that belong to the factory order.
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'factory_order_items', 'factory_order_id', 'item_id')->withPivot('sub_quantity', 'total_quantity', 'serial');
    }

    /**
     * The order items that belong to the factory order.
     */
    public function factoryOrderItems()
    {
        return $this->hasMany(FactoryOrderItem::class, 'factory_order_id');
    }
}
