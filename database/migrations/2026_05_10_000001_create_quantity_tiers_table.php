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
        Schema::create('quantity_tiers', function (Blueprint $table) {
            $table->id();
            $table->string('label'); // Starter, Medium, Bulk
            $table->unsignedInteger('min_qty');
            $table->unsignedInteger('max_qty')->nullable(); // null untuk unlimited
            $table->unsignedBigInteger('price_per_unit')->nullable(); // null untuk negotiable
            $table->boolean('is_negotiable')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quantity_tiers');
    }
};
