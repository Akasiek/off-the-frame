<?php

namespace App\Http\Resources;

use App\Models\ProductCategory;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin ProductCategory
 */
class ProductCategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'order_position' => $this->order_position,
            'slug' => $this->slug,
        ];
    }
}
