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
        $categoryParam = request()->query('category');
        $query = Product::with(['category', 'links', 'images'])->orderBy('created_at', 'desc');

        if ($categoryParam) {
            $query->whereHas('category', function ($query) use ($categoryParam) {
                $query->where('slug', $categoryParam);
            });
        }

        $resource = ProductResource::collection($query->paginate(24));

        return Inertia::render('Product/Home', [
            'products' => $resource,
            'categories' => ProductCategory::orderBy('order_position')->get(),
        ]);
    }

    public function show(Product $product)
    {
        $product = new ProductResource($product->load(['category', 'links', 'images']));

        return Inertia::render('Product/View', [
            'product' => $product,
        ]);
    }

    public function dashboard(): Response
    {
        $products = ProductResource::collection(Product::with(['category', 'links', 'images'])->orderBy('created_at', 'desc')->paginate(24));
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
        ProductService::update($request, $product);

        return $this->dashboard();
    }

    public function destroy(Product $product)
    {
        ProductService::delete($product);

        return $this->dashboard();
    }
}
