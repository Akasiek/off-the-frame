<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryRequest;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Http\Resources\ProductCategoryResource;
use App\Models\ProductCategory;
use Inertia\Inertia;
use Inertia\Response;
use function redirect;

class ProductCategoryController extends Controller
{
    public function dashboard(): Response
    {
        $categories = ProductCategoryResource::collection(ProductCategory::orderBy('order_position')->paginate(24));
        
        return Inertia::render('ProductCategory/Dashboard', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryRequest $request)
    {
        ProductCategory::create($request->validated());

        return $this->dashboard();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryRequest $request, ProductCategory $productCategory)
    {
        $productCategory->update($request->validated());

        return $this->dashboard();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        // Validate for products in this category
        if ($productCategory->products()->exists()) {
            return redirect()->back()->withErrors(['message' => 'Ta kategoria zawiera produkty.']);
        }

        $productCategory->delete();

        return $this->dashboard();
    }
}
