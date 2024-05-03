<?php

namespace App\Http\Controllers;

use App\Http\Requests\OutfitOfTheDayRequest;
use App\Http\Resources\OutfitOfTheDayResource;
use App\Http\Services\OutfitOfTheDayService;
use App\Models\OutfitOfTheDay;
use App\Models\Product;
use Inertia\Inertia;
use Inertia\Response;

class OutfitOfTheDayController extends Controller
{
    public function index()
    {
        return OutfitOfTheDayResource::collection(OutfitOfTheDay::with(['products'])->get());
    }

    public function show(OutfitOfTheDay $outfitOfTheDay)
    {
        $resource = new OutfitOfTheDayResource($outfitOfTheDay->load(['products', 'products.images', 'products.links']));

        return Inertia::render('OutfitOfTheDay/View', [
            'outfitOfTheDay' => $resource,
        ]);
    }

    public function dashboard(): Response
    {
        $OftD = OutfitOfTheDayResource::collection(OutfitOfTheDay::with(['products'])->get());
        $products = Product::all();

        return Inertia::render('OutfitOfTheDay/Dashboard', [
            'outfitsOfTheDay' => $OftD,
            'products' => $products,
        ]);
    }

    public function store(OutfitOfTheDayRequest $request)
    {
        OutfitOfTheDayService::create($request);

        return redirect()->route('outfits-of-the-day.dashboard');
    }


    public function update(OutfitOfTheDayRequest $request, OutfitOfTheDay $outfitOfTheDay)
    {
        OutfitOfTheDayService::update($request, $outfitOfTheDay);

        return redirect()->route('outfits-of-the-day.dashboard');
    }

    public function destroy(OutfitOfTheDay $outfitOfTheDay)
    {
        OutfitOfTheDayService::delete($outfitOfTheDay);

        return redirect()->route('outfits-of-the-day.dashboard');
    }
}
