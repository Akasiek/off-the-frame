<?php

namespace App\Models;

use App\Http\Requests\OutfitOfTheDayRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class OutfitOfTheDay extends Model
{
    use HasFactory;

    protected $table = 'outfits_of_the_day';
    protected $fillable = [
        'name',
        'image_source_url',
        'image',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function styleGuides(): BelongsToMany
    {
        return $this->belongsToMany(StyleGuide::class);
    }

    public function addImage(OutfitOfTheDayRequest $request): bool
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('outfit_of_the_day_images', 'public');
            $this->image = $path;
            return $this->save();
        }

        return false;
    }

    public function deleteImage(): bool
    {
        Storage::disk('public')->delete($this->image);
        $this->image = null;
        return $this->save();
    }
}
