<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'url', 'price', 'store'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
