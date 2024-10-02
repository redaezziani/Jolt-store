<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('discount_id')->nullable(); // Foreign key for discounts
            $table->string('cover_img'); // Cover image
            $table->timestamps();
        });

        // Optionally, you can set up a foreign key constraint
        Schema::table('deals', function (Blueprint $table) {
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('deals', function (Blueprint $table) {
            $table->dropForeign(['discount_id']);
        });
        Schema::dropIfExists('deals');
    }
}
