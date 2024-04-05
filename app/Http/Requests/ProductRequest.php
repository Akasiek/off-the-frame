<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'brand' => ['required'],
            'model' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
