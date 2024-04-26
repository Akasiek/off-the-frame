<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class StyleGuide extends Model
{
    use HasFactory, ImageTrait;

    protected $fillable = [
        'name',
        'description',
        'image'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function outfitsOfTheDay(): BelongsToMany
    {
        return $this->belongsToMany(OutfitOfTheDay::class);
    }

    public function getImageStorePath(): string
    {
        return "style_guide_images";
    }
}
