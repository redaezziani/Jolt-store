<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class UpdateProductPricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all products
        $products = Product::all();

        // Loop through each product and update the price
        foreach ($products as $product) {
            // Generate a random float between 50.00 and 320.00
            $randomPrice = mt_rand(5000, 32000) / 100; // Generate a price between 50.00 and 320.00

            // Update the product price directly without formatting
            $product->update(['price' => $randomPrice]);
        }
    }
}
