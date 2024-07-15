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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('color');
            $table->string('size');
<<<<<<< Updated upstream:database/migrations/2024_05_26_035830_create_products_table.php
            $table->integer('quantity');
            $table->decimal('initial_price');
            $table->decimal('last_rented_price');
=======
            $table->integer('quantity')->default(0);
            $table->decimal('initial_price', 8, 2);
            $table->decimal('last_rented_price', 8, 2)->default(0.00);
>>>>>>> Stashed changes:database/migrations/2024_05_26_035803_create_products_table.php
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }

    
};
