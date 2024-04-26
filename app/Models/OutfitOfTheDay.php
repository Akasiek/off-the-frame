<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class OutfitOfTheDay extends Model
{
    use HasFactory, ImageTrait;

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

    public function getImageStorePath(): string
    {
        return "outfit_of_the_day_images";
    }
}
