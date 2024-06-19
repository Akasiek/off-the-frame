<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Shoes',
            'T-Shirts & Tops',
            'Coats & Jackets',
            'Knitwear',
            'Hoodies',
            'Trousers',
            'Dresses',
            'Accessories'
        ];

        foreach ($categories as $category) {
            ProductCategory::updateOrCreate([
                'name' => $category
            ]);
        }
    }
}
