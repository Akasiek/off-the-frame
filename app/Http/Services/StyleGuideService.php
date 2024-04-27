<?php

namespace App\Http\Services;

use App\Http\Requests\StyleGuideRequest;
use App\Models\StyleGuide;

class StyleGuideService
{
    public static function create(StyleGuideRequest $request): void
    {
        $model = StyleGuide::create($request->validated());
        $model->addImage($request);

        foreach ($request->outfitsOfTheDay as $outfitOfTheDay_id) {
            $model->outfitsOfTheDay()->attach($outfitOfTheDay_id);
        }

        foreach ($request->products as $product_id) {
            $model->products()->attach($product_id);
        }
    }

    public static function update(StyleGuideRequest $request, StyleGuide $styleGuide): void
    {
        $styleGuide->update($request->validated());

        if ($request->hasFile('image') && $request->file('image')->isFile()) {
            if ($styleGuide->image) {
                $styleGuide->deleteImage();
            }
            $styleGuide->addImage($request);
        }

        $styleGuide->outfitsOfTheDay()->detach();
        foreach ($request->outfitsOfTheDay as $outfitOfTheDay_id) {
            $styleGuide->outfitsOfTheDay()->attach($outfitOfTheDay_id);
        }

        $styleGuide->products()->detach();
        foreach ($request->products as $product_id) {
            $styleGuide->products()->attach($product_id);
        }
    }

    public static function delete(StyleGuide $styleGuide): void
    {
        $styleGuide->outfitsOfTheDay()->detach();
        if ($styleGuide->image) {
            $styleGuide->deleteImage();
        }
        $styleGuide->products()->detach();
        $styleGuide->delete();
    }
}
