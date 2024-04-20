<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Services\ProductService;
use App\Models\Product;
use App\Models\ProductCategory;
use Inertia\Inertia;
use Inertia\Response;
use function MongoDB\BSON\toJSON;

class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function dashboard(): Response
    {
        $products = ProductResource::collection(Product::with(['category', 'links', 'images'])->get());
        $categories = ProductCategory::all();

        return Inertia::render('Product/Dashboard', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function store(ProductRequest $request)
    {
        // new ProductResource(Product::create($request->validated()));

        ProductService::create($request);

        return $this->dashboard();
    }


    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json();
    }
}
