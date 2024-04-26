<?php

namespace App\Http\Controllers;

use App\Http\Requests\StyleGuideRequest;
use App\Http\Resources\StyleGuideResource;
use App\Http\Services\StyleGuideService;
use App\Models\OutfitOfTheDay;
use App\Models\Product;
use App\Models\StyleGuide;
use Inertia\Inertia;
use Inertia\Response;

class StyleGuideController extends Controller
{
    public function index()
    {
        return StyleGuideResource::collection(StyleGuide::with(['outfitsOfTheDay', 'products'])->get());
    }

    public function show(StyleGuide $styleGuide)
    {
        return new StyleGuideResource($styleGuide->load(['outfitsOfTheDay', 'products']));
    }

    public function dashboard(): Response
    {
        $styleGuides = StyleGuideResource::collection(StyleGuide::with(['outfitsOfTheDay', 'products'])->get());
        $outfitsOfTheDay = OutfitOfTheDay::all();
        $products = Product::all();

        return Inertia::render('StyleGuide/Dashboard', [
            'styleGuides' => $styleGuides,
            'outfitsOfTheDay' => $outfitsOfTheDay,
            'products' => $products,
        ]);
    }

    public function store(StyleGuideRequest $request)
    {
        StyleGuideService::create($request);

        return $this->dashboard();
    }

    public function update(StyleGuideRequest $request, StyleGuide $styleGuide)
    {
        StyleGuideService::update($request, $styleGuide);

        return $this->dashboard();
    }

    public function destroy(StyleGuide $styleGuide)
    {
        StyleGuideService::delete($styleGuide);

        return $this->dashboard();
    }
}
