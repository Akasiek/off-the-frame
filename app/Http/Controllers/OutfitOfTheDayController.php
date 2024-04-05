<?php

namespace App\Http\Controllers;

use App\Http\Requests\OutfitOfTheDayRequest;
use App\Http\Resources\OutfitOfTheDayResource;
use App\Models\OutfitOfTheDay;

class OutfitOfTheDayController extends Controller
{
    public function index()
    {
        return OutfitOfTheDayResource::collection(OutfitOfTheDay::all());
    }

    public function store(OutfitOfTheDayRequest $request)
    {
        return new OutfitOfTheDayResource(OutfitOfTheDay::create($request->validated()));
    }

    public function show(OutfitOfTheDay $outfitOfTheDay)
    {
        return new OutfitOfTheDayResource($outfitOfTheDay);
    }

    public function update(OutfitOfTheDayRequest $request, OutfitOfTheDay $outfitOfTheDay)
    {
        $outfitOfTheDay->update($request->validated());

        return new OutfitOfTheDayResource($outfitOfTheDay);
    }

    public function destroy(OutfitOfTheDay $outfitOfTheDay)
    {
        $outfitOfTheDay->delete();

        return response()->json();
    }
}
