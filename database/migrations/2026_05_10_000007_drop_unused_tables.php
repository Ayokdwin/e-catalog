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
        // Drop product_variants first (has foreign key to sizes)
        Schema::dropIfExists('product_variants');
        
        // Drop sizes table
        Schema::dropIfExists('sizes');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Recreate sizes table
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->bigInteger('price_adjustment')->default(0);
            $table->timestamps();
        });

        // Recreate product_variants table
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('size_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('base_price');
            $table->unsignedInteger('stock')->default(0);
            $table->timestamps();
        });
    }
};
