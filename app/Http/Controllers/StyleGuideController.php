<?php

namespace App\Http\Controllers;

use App\Http\Requests\StyleGuideRequest;
use App\Http\Resources\StyleGuideResource;
use App\Models\StyleGuide;

class StyleGuideController extends Controller
{
    public function index()
    {
        return StyleGuideResource::collection(StyleGuide::all());
    }

    public function store(StyleGuideRequest $request)
    {
        return new StyleGuideResource(StyleGuide::create($request->validated()));
    }

    public function show(StyleGuide $styleGuide)
    {
        return new StyleGuideResource($styleGuide);
    }

    public function update(StyleGuideRequest $request, StyleGuide $styleGuide)
    {
        $styleGuide->update($request->validated());

        return new StyleGuideResource($styleGuide);
    }

    public function destroy(StyleGuide $styleGuide)
    {
        $styleGuide->delete();

        return response()->json();
    }
}
