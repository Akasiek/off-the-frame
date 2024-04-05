<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('style_guides', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        // Many-to-many relationship with Product
        Schema::create('product_style_guide', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('style_guide_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        // Many-to-many relationship with OutfitOfTheDay
        Schema::create('outfit_of_the_day_style_guide', function (Blueprint $table) {
            $table->id();
            $table->foreignId('outfit_of_the_day_id')->constrained()->cascadeOnDelete();
            $table->foreignId('style_guide_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('style_guides');
        Schema::dropIfExists('product_style_guide');
        Schema::dropIfExists('outfit_of_the_day_style_guide');
    }
};
