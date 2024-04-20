<?php

namespace App\Http\Services;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductImage;

class ProductService
{
    public static function create(ProductRequest $request): void
    {
        // Create a new product
        $product = Product::create($request->validated());

        // Create product's links
        foreach ($request->links as $link) {
            $product->links()->create($link);
        }

        // Create product's images
        ProductImage::addImages($product, $request);
    }

    public static function update(ProductRequest $request, Product $product): void
    {
        // Update the product
        $product->update($request->validated());

        // Update product's links
        $product->links()->delete();
        $request->links()->each(fn($link) => $product->links()->create($link));

        // Update product's images
        $product->images()->delete();
        ProductImage::addImages($product, $request);
    }

    public static function delete(Product $product): void
    {
        $product->delete();
        $product->links()->delete();
        $product->images()->delete();
    }
}
