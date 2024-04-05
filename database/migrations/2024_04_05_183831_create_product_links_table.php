<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_links', function (Blueprint $table) {
            $table->id();

            $table->string('url');
            $table->float('price');
            $table->string('store');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_links');
    }
};
