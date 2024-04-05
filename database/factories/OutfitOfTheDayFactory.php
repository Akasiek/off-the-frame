<?php

namespace Database\Factories;

use App\Models\OutfitOfTheDay;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class OutfitOfTheDayFactory extends Factory
{
    protected $model = OutfitOfTheDay::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'image_source_url' => $this->faker->imageUrl(),
        ];
    }
}
