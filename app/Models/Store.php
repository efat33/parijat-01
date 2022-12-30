<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'type',
        'commission_1',
        'commission_2',
    ];

    /**
     * The items that belong to the store.
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'store_items', 'store_id', 'item_id')->withPivot('serial', 'section');;
    }

    /**
     * The raw materials that belong to the store.
     */
    public function rawMaterials()
    {
        return $this->belongsToMany(RawMaterial::class, 'store_raw_materials', 'store_id', 'raw_material_id')->withPivot('serial', 'section');;
    }

    /**
     * Get all the orders associated with the store
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
