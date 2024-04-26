<?php

namespace App\Http\Services;

use App\Http\Requests\OutfitOfTheDayRequest;
use App\Models\OutfitOfTheDay;

class OutfitOfTheDayService
{
    public static function create(OutfitOfTheDayRequest $request): void
    {
        $model = OutfitOfTheDay::create($request->validated());
        $model->addImage($request);

        foreach ($request->products as $product_id) {
            $model->products()->attach($product_id);
        }
    }

    public static function update(OutfitOfTheDayRequest $request, OutfitOfTheDay $outfitOfTheDay): void
    {
        $outfitOfTheDay->update($request->validated());

        $outfitOfTheDay->products()->detach();
        foreach ($request->products as $product_id) {
            $outfitOfTheDay->products()->attach($product_id);
        }

        if ($request->hasFile('image')) {
            $outfitOfTheDay->deleteImage();
            $outfitOfTheDay->addImage($request);
        }
    }

    public static function delete(OutfitOfTheDay $outfitOfTheDay): void
    {
        $outfitOfTheDay->products()->detach();
        if ($outfitOfTheDay->image) {
            $outfitOfTheDay->deleteImage();
        }
        $outfitOfTheDay->delete();
    }
}
