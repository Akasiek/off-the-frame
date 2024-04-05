<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductLinkRequest;
use App\Http\Resources\ProductLinkResource;
use App\Models\ProductLink;

class ProductLinkController extends Controller
{
    public function index()
    {
        return ProductLinkResource::collection(ProductLink::all());
    }

    public function store(ProductLinkRequest $request)
    {
        return new ProductLinkResource(ProductLink::create($request->validated()));
    }

    public function show(ProductLink $productLink)
    {
        return new ProductLinkResource($productLink);
    }

    public function update(ProductLinkRequest $request, ProductLink $productLink)
    {
        $productLink->update($request->validated());

        return new ProductLinkResource($productLink);
    }

    public function destroy(ProductLink $productLink)
    {
        $productLink->delete();

        return response()->json();
    }
}
