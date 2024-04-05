<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductLinkRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'url' => ['required'],
            'price' => ['required', 'numeric'],
            'store' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
