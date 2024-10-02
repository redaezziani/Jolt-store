<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run()
    {
        // Get a specific product (for example, product with ID 1)
        $product = Product::find(87);

        // Get random users to assign comments to them
        $users = User::inRandomOrder()->take(10)->get(); // Using 10 random users

        // Seed 100 comments in Arabic
        for ($i = 0; $i < 100; $i++) {
            Comment::create([
                'comment_text' => $this->generateArabicText(),
                'product_id'   => $product->id,
                'user_id'      => 3,
                'rating'       => rand(1, 5), // Random rating between 1 and 5
                'status'       => 'show', // Assuming 'approved' is a valid status
            ]);
        }
    }

    /**
     * Generate a sample Arabic comment text
     */
    private function generateArabicText()
    {
        $comments = [
            'منتج رائع جدا!',
            'أعجبني المنتج وسوف أشتريه مرة أخرى.',
            'سعر ممتاز مقابل الجودة.',
            'خدمة التوصيل كانت سريعة!',
            'التغليف جيد جدا.',
            'لم أكن راضياً عن المنتج تماماً.',
            'تجربة ممتازة وسأوصي به للأصدقاء.',
            'المنتج مطابق للوصف على الموقع.',
            'سأشتري المزيد من هذا المتجر.',
            'جودة المنتج عالية وسعره مناسب.'
        ];

        return $comments[array_rand($comments)];
    }
}
