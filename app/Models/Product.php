<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'product_category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function links(): HasMany
    {
        return $this->hasMany(ProductLink::class, 'product_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function outfitsOfTheDay(): BelongsToMany
    {
        return $this->belongsToMany(OutfitOfTheDay::class);
    }

    public function styleGuides(): BelongsToMany
    {
        return $this->belongsToMany(StyleGuide::class);
    }
}
