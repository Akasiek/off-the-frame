<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('outfit_of_the_days', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image_source_url');
            $table->timestamps();
        });

        // Many-to-many relationship between OutfitOfTheDay and Product
        Schema::create('outfit_of_the_day_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('outfit_of_the_day_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('outfit_of_the_days');
        Schema::dropIfExists('outfit_of_the_day_product');
    }
};
