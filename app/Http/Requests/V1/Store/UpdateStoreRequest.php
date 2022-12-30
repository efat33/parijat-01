<?php

namespace App\Http\Requests\V1\Store;

use App\Enums\StoreType;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', Rule::in(array_values(StoreType::cases()))],
            'commission_1' => ['required', 'integer'],
            'commission_2' => ['required', 'integer'],
        ];
    }
}
