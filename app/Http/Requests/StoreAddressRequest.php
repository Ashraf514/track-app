<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
            'user_id'=>["required","exists:users,id"],
            'is_primary'=>["boolean"],
            'country_id'=>["required","exists:countries,id"],
            'state'=>["required","string"],
            'city'=>["required","string"],
            'pincode'=>["required","integer"],
        ];
    }
}
