<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

/** @mixin \App\Models\StyleGuide */
class StyleGuideResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image ? Storage::url($this->image) : null,

            'products' => ProductResource::collection($this->whenLoaded('products')),
            'outfitsOfTheDay' => OutfitOfTheDayResource::collection($this->whenLoaded('outfitsOfTheDay')),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
