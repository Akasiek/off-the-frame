<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

/** @mixin \App\Models\OutfitOfTheDay */
class OutfitOfTheDayResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id' => $this->id,
            'name' => $this->name,
            'image_source_url' => $this->image_source_url,
            'image' => $this->image ? Storage::url($this->image) : null,

            'products' => ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
