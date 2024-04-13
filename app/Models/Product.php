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

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function productLink(): HasMany
    {
        return $this->hasMany(ProductLink::class);
    }

    public function outfitOfTheDays(): BelongsToMany
    {
        return $this->belongsToMany(OutfitOfTheDay::class);
    }

    public function styleGuides(): BelongsToMany
    {
        return $this->belongsToMany(StyleGuide::class);
    }
}
