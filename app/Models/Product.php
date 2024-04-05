<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'product_link_id',
        'product_category_id',
    ];

    public function productLink(): BelongsTo
    {
        return $this->belongsTo(ProductLink::class);
    }

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
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
