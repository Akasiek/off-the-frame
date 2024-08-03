<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @mixin Product
 */
class ProductCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'order_position' => ['required', 'integer', 'min:0'],
            'parent_id' => ['sometimes', 'nullable', 'integer', 'min:0', 'exists:product_categories,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
