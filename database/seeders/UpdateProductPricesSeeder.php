<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; // Make sure to import the Product model
use Illuminate\Support\Facades\DB;

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
            $randomPrice = mt_rand(5000, 32000) / 100;

            // Format the price with a comma as the decimal separator
            $formattedPrice = number_format($randomPrice, 2, ',', ''); // 2 decimal places

            // Update the product price
            $product->update(['price' => $formattedPrice]);
        }
    }
}
