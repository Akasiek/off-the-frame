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
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
