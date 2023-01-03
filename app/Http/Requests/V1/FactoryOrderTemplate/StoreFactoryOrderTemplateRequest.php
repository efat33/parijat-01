<?php

namespace App\Http\Requests\V1\FactoryOrderTemplate;

use Illuminate\Foundation\Http\FormRequest;

class StoreFactoryOrderTemplateRequest extends FormRequest
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
            'labels.*.name' => ['required', 'string'],
            'labels.*.value' => ['required', 'string'],

            'items.*.item_id' => ['required', 'integer'],
            'items.*.serial' => ['required', 'integer'],
        ];
    }
}
