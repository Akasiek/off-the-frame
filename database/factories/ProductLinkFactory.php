<?php

namespace Database\Factories;

use App\Models\ProductLink;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductLinkFactory extends Factory
{
    protected $model = ProductLink::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'url' => $this->faker->url(),
            'price' => $this->faker->randomFloat(),
            'store' => $this->faker->word(),
        ];
    }
}
