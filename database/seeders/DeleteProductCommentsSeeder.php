<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class DeleteProductCommentsSeeder extends Seeder
{
    public function run()
    {
        // Specify the product_id of the product whose comments you want to delete
        $productId = 87; // Change this to the product_id you want

        // Delete all comments associated with the product
        Comment::where('product_id', $productId)->delete();

        // Optional: Output a message
        $this->command->info("All comments for product with ID {$productId} have been deleted.");
    }
}
