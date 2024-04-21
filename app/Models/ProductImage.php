<?php

namespace App\Models;

use App\Http\Requests\ProductRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

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

    public static function deleteImages(Product $product): void
    {
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->url);
            $image->delete();
        }
    }
}
