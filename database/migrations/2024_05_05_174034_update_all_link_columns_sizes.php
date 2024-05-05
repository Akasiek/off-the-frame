<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('product_links', function (Blueprint $table) {
            $table->string('url', 2048)->change();
        });

        Schema::table('outfits_of_the_day', function (Blueprint $table) {
            $table->string('image_source_url', 2048)->change();
            $table->string('image', 2048)->change();
        });

        Schema::table('style_guides', function (Blueprint $table) {
            $table->string('image', 2048)->change();
        });

        Schema::table('product_images', function (Blueprint $table) {
            $table->string('url', 2048)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_links', function (Blueprint $table) {
            $table->string('url')->change();
        });

        Schema::table('outfits_of_the_day', function (Blueprint $table) {
            $table->string('image_source_url')->change();
            $table->string('image')->change();
        });

        Schema::table('style_guides', function (Blueprint $table) {
            $table->string('image')->change();
        });

        Schema::table('product_images', function (Blueprint $table) {
            $table->string('url')->change();
        });
    }
};
