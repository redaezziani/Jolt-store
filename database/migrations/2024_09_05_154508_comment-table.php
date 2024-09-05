<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create the comments table
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('comment_text'); // Text of the comment
            $table->unsignedBigInteger('product_id'); // Foreign key to products table
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); // Link to product
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Link to user
            $table->integer('rating')->default(0); // Rating (1 to 5)
            $table->timestamps();
        });

        // Create the trigger to update the product rating for SQLite
        DB::unprepared('
            CREATE TRIGGER update_product_rating AFTER INSERT ON comments
            FOR EACH ROW
            BEGIN
                -- Update the product\'s rating with the new average
                UPDATE products
                SET rating = (
                    SELECT AVG(rating)
                    FROM comments
                    WHERE product_id = NEW.product_id
                )
                WHERE id = NEW.product_id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the trigger first
        DB::unprepared('DROP TRIGGER IF EXISTS update_product_rating');

        // Drop the comments table
        Schema::dropIfExists('comments');
    }
};
