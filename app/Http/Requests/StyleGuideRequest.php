<?php

namespace App\Http\Requests;

use App\Models\StyleGuide;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @mixin StyleGuide
 */
class StyleGuideRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'description' => ['required'],
            'image' => ['required', 'image'],

            'products' => ['required', 'array'],
            'products.*' => ['integer', 'exists:products,id'],

            'outfitsOfTheDay' => ['required', 'array'],
            'outfitsOfTheDay.*' => ['integer', 'exists:outfits_of_the_day,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
