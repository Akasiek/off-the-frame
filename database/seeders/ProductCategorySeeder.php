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
            'Hoodies & Sweatshirts',
            'Trousers',
            'Dresses',
            'Skirts',
            'Accessories',
            'Jewellery',
        ];

        foreach ($categories as $order => $category) {
            ProductCategory::updateOrCreate([
                'name' => $category
            ], [
                'order_position' => $order + 1,
            ]);
        }
    }
}
