<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // UUID as primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Assuming orders are linked to users
            $table->decimal('total', 10, 2); // Total order amount
            $table->string('status')->default('pending'); // Order status (e.g., pending, completed)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}
