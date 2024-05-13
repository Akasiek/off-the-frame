<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OutfitOfTheDayRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'image_source_url' => ['required'],
            'image' => ['required', 'image'],

            // 'products' is an array of ids, e.g. ['54', '23', '12']
            'products' => ['required', 'array'],
            'products.*' => ['integer', 'exists:products,id']

        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
