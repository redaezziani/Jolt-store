<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Deal;
use App\Models\Product;
use Illuminate\Support\Str;

class DealSeeder extends Seeder
{
    public function run()
    {
        // Check if the deal already exists
        $existingDeal = Deal::where('name', 'ملابس هوبير هولم للنساء')->first();

        if (!$existingDeal) {
            $deal = Deal::create([
                'name' => 'ملابس هوبير هولم للنساء',
                'description' => null,
                'slug' => Str::slug('ملابس هوبير هولم للنساء') . '-' . uniqid(),
                'discount_id' => 4,
                'cover_img' => 'src="https://f.nooncdn.com/noon-cdn/namshi-cms/pages/20241001/first-fold/women/city-girl/module-01-en.jpg',
            ]);

            // Associate all products of category_id 8 with this deal
            $products = Product::where('category_id', 2)->get();
            foreach ($products as $product) {
                $deal->products()->attach($product->id); // Use attach to link the deal with products
            }
        }
    }
}
