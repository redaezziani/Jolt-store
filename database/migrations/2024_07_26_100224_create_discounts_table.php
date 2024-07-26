<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id(); // UUID as primary key
            $table->string('name'); // Name of the discount
            $table->decimal('value', 8, 2); // Discount value, e.g., 10.00
            $table->unsignedBigInteger('product_id'); // Product ID
            $table->date('start_date'); // Start date of the discount
            $table->date('end_date'); // End date of the discount
            $table->timestamps(); // Timestamps for created_at and updated_at

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
}
