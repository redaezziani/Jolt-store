<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('cover_img');
            $table->text('prev_imgs')->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('rating')->default(0);
            $table->float('price')->default(0);
            $table->text('sizes')->nullable();
            $table->text('colors')->nullable();
            $table->text('shipping')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('slug')->unique(); // Adding a unique slug
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
