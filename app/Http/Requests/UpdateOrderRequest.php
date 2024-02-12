<?php

namespace App\Http\Requests;

use App\Enums\OrderType;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // "user_id"   =>["required","exists:users,id"],
            "amount"    =>["required","numeric"],
            "address_id"    =>["required","exists:addresses,id"],
            "order_type"    =>["required","string","in:".OrderType::ALL_TYPES],
            "additional_info"   =>["required"],
        ];
    }
}
