<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @mixin Product
 */
class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'brand' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'product_category_id' => ['required', 'exists:product_categories,id'],

            'links' => ['array'],
            'links.*.store' => ['required', 'string', 'max:255'],
            'links.*.url' => ['required', 'url'],
            'links.*.price' => ['required', 'numeric'],

            'images' => ['array'],
            'images.*.url' => ['required', 'file', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
