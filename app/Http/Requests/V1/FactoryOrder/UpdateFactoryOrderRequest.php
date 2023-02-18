<?php

namespace App\Http\Requests\V1\FactoryOrder;

use App\Models\FactoryOrder;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFactoryOrderRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'order_date' => ['required', 'date'],  // factory_order is passed in the route ~ api/v1/factory-order/{factory_order}

            'items.*.item_id' => ['required', 'integer'],
            'items.*.sub_quantity' => ['required', 'json'],
            'items.*.total_quantity' => ['required', 'integer'],
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
            'items.*.sub_quantity.required' => 'Item Sub Quantity is required',
            'items.*.sub_quantity.json' => 'The Item Sub Quantity must be in JSON format',
            'items.*.total_quantity.required' => 'Item Total Quantity is required',
            'items.*.total_quantity.integer' => 'The Total Quantity must be an integer'
        ];
    }
}
