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
            $table->id(); // Order ID as primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // First name and last name
            $table->string('firstname');
            $table->string('lastname'); // Fixed typo
            $table->decimal('total', 10, 2); // Total order amount
            $table->string('status')->default('pending');
            $table->string('phone'); // Phone number
            $table->string('city'); // City
            $table->text('address'); // Address
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
