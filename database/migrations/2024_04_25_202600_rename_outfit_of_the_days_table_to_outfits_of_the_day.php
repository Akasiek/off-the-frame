<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::rename("outfit_of_the_days", "outfits_of_the_day");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename("outfits_of_the_day", "outfit_of_the_days");
    }
};
