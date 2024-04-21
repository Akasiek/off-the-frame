<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Services\ProductService;
use App\Models\Product;
use App\Models\ProductCategory;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::with(['category', 'links', 'images'])->get());
    }

    public function show(Product $product)
    {
        return new ProductResource($product->load(['category', 'links', 'images']));
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
        ProductService::delete($product);

        return $this->dashboard();
    }
}
