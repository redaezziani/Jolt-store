<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Use a transaction to ensure data integrity
        \DB::transaction(function () use ($faker) {
            // Generate 1000 products
            for ($i = 0; $i < 1000; $i++) {
                // Generate a unique slug
                $slug = $this->generateUniqueSlug($faker);

                Product::create([
                    'name' => $faker->word . ' ' . $faker->word,
                    'description' => $faker->text,
                    'cover_img' => $faker->imageUrl(),
                    'prev_imgs' => json_encode([$faker->imageUrl(), $faker->imageUrl()]),
                    'quantity' => $faker->numberBetween(1, 100),
                    'rating' => $faker->numberBetween(1, 5),
                    'sizes' => json_encode(['S', 'M', 'L']),
                    'colors' => json_encode(['Red', 'Green', 'Blue']),
                    'shipping' => $faker->boolean ? 'Free Shipping' : 'Standard Shipping',
                    'category_id' => $faker->numberBetween(1, 1), // Assuming you have categories with IDs 1-10
                    'slug' => $slug,
                ]);
            }
        });
    }

    private function generateUniqueSlug($faker)
    {
        do {
            $slug = Str::slug($faker->word . ' ' . $faker->word);
        } while (Product::where('slug', $slug)->exists());

        return $slug;
    }
}
