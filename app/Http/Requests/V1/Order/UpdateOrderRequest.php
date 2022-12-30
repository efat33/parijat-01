<?php

namespace App\Http\Requests\V1\Order;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'store_id' => ['required', 'integer'],
            'subtotal' => ['required', 'numeric'],
            'commission_1' => ['required', 'integer'],
            'commission_2' => ['required', 'integer'],
            'total' => ['required', 'numeric'],

            'items.*.item_id' => ['required', 'integer'],
            'items.*.quantity_ija' => ['required', 'integer'],
            'items.*.quantity_aj' => ['required', 'integer'],
            'items.*.price' => ['required', 'integer'],

            'raw_materials.*.raw_material_id' => ['required', 'integer'],
            'raw_materials.*.quantity_aj' => ['required', 'integer'],
            'raw_materials.*.price' => ['required', 'integer'],
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'items.*.item_id.required' => 'Items must have ID',
            'items.*.item_id.integer' => 'The item ID must be an integer',
            'items.*.quantity_ija.required' => 'Item Quantity Ija is required',
            'items.*.quantity_ija.integer' => 'The Item Quantity Ija must be an integer',
            'items.*.quantity_aj.required' => 'Item Quantity Aj is required',
            'items.*.quantity_aj.integer' => 'The Item Quantity Aj must be an integer',
            'items.*.price.required' => 'Item Price is required',
            'items.*.price.integer' => 'The item Price must be an integer',

            'raw_materials.*.raw_material_id.required' => 'Raw Material must have ID',
            'raw_materials.*.raw_material_id.integer' => 'The Raw Material ID must be an integer',
            'raw_materials.*.quantity_aj.required' => 'Raw Material Quantity Aj is required',
            'raw_materials.*.quantity_aj.integer' => 'The Raw Material Quantity Aj must be an integer',
            'raw_materials.*.price.required' => 'Raw Material Price is required',
            'raw_materials.*.price.integer' => 'The Raw Material Price must be an integer',
        ];
    }
}
