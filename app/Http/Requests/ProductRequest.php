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
            'brand' => ['required'],
            'model' => ['required'],
            'product_category_id' => ['required', 'exists:product_categories,id'],

            'links' => ['array'],
            'links.*.store' => ['required', 'string'],
            'links.*.url' => ['required', 'url'],
            'links.*.price' => ['required', 'numeric'],

            'images' => ['array'],
            'images.*.url' => ['required', 'file', 'mimes:jpg,jpeg,png'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
