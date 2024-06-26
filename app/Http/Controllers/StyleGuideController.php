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
        $resource = StyleGuideResource::collection(StyleGuide::with(['outfitsOfTheDay', 'products'])->paginate(24));

        return Inertia::render('StyleGuide/Home', [
            'styleGuides' => $resource,
        ]);
    }

    public function show(StyleGuide $styleGuide)
    {
        $resource = new StyleGuideResource($styleGuide->load(['outfitsOfTheDay', 'products', 'products.images', 'products.links']));

        return Inertia::render('StyleGuide/View', [
            'styleGuide' => $resource,
        ]);
    }

    public function dashboard(): Response
    {
        $styleGuides = StyleGuideResource::collection(StyleGuide::with(['outfitsOfTheDay', 'products'])->orderBy('created_at', 'desc')->paginate(24));
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

        return redirect()->route('style-guides.dashboard');
    }

    public function update(StyleGuideRequest $request, StyleGuide $styleGuide)
    {
        StyleGuideService::update($request, $styleGuide);

        return redirect()->route('style-guides.dashboard');
    }

    public function destroy(StyleGuide $styleGuide)
    {
        StyleGuideService::delete($styleGuide);

        return redirect()->route('style-guides.dashboard');
    }
}
