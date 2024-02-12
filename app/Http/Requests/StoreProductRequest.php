<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'category_id'=>["required","exists:categories,id"],
            'title'=>["required"],
            'brand'=>["required"],
            'description'=>["required","max:200"],
            'price'=>["required","numeric","gt:0"],
            'product_key_info'=>["required","array","min:1"],
            'product_key_info.*.title'=>["required","string","max:100"],
            'product_key_info.*.description'=>["required","string","max:300"],
        ];
    }
}
