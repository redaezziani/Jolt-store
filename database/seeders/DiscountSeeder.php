<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Discount;
use Carbon\Carbon;

class DiscountSeeder extends Seeder
{
    public function run()
    {
        // Get the last 8 products
        $products = Product::orderBy('id', 'desc')->take(8)->get();

        // Define discount details
        $discounts = [
            ['name' => 'Summer Sale', 'value' => 15.00],
            ['name' => 'Flash Sale', 'value' => 20.00],
            ['name' => 'Clearance', 'value' => 30.00],
            ['name' => 'Holiday Discount', 'value' => 25.00],
            ['name' => 'End of Season Sale', 'value' => 18.00],
            ['name' => 'Limited Time Offer', 'value' => 22.00],
            ['name' => 'Back to School Sale', 'value' => 10.00],
            ['name' => 'Winter Warm-up', 'value' => 28.00],
        ];

        // Seed discounts for the last 8 products
        foreach ($products as $key => $product) {
            $discount = $discounts[$key % count($discounts)]; // Cycle through discounts
            Discount::create([
                'name' => $discount['name'],
                'value' => $discount['value'],
                'product_id' => $product->id,
                'start_date' => Carbon::now()->subDays($key + 1), // Start date from past days
                'end_date' => Carbon::now()->addDays($key + 7), // End date 7 days ahead
            ]);
        }
    }
}
