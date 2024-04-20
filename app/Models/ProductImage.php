<?php

namespace App\Models;

use App\Http\Requests\ProductRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Request;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'url',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public static function addImages(Product $product, ProductRequest $request): void
    {
        foreach ($request->file('images') as $image) {
            $path = $image['url']->store('product_images', 'public');

            $product->images()->create([
                'url' => $path,
            ]);
        }
    }
}
