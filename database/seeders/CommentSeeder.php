<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run()
    {
        // Arabic comments to seed for product ID 77
        $comments = [
            [
                'comment_text' => 'هذا المنتج رائع للغاية! أنصح الجميع بشرائه.',
                'product_id' => 77,
                'user_id' => 1,  // Assuming there's a user with ID 1
                'rating' => 5,
                'status' => 'approved'
            ],
            [
                'comment_text' => 'الخامة ممتازة ولكن المقاس كان صغيرًا.',
                'product_id' => 77,
                'user_id' => 3,  // Assuming there's a user with ID 2
                'rating' => 4,
                'status' => 'approved'
            ],
            [
                'comment_text' => 'المنتج جيد، لكن السعر مرتفع قليلاً.',
                'product_id' => 77,
                'user_id' => 3,  // Assuming there's a user with ID 3
                'rating' => 3,
                'status' => 'approved'
            ],
            [
                'comment_text' => 'تجربة شراء رائعة، سأشتري مرة أخرى.',
                'product_id' => 77,
                'user_id' => 3,  // Assuming there's a user with ID 4
                'rating' => 5,
                'status' => 'approved'
            ],
            [
                'comment_text' => 'لم أكن راضيًا عن الجودة، كنت أتوقع الأفضل.',
                'product_id' => 77,
                'user_id' => 3,  // Assuming there's a user with ID 5
                'rating' => 2,
                'status' => 'approved'
            ]
        ];

        foreach ($comments as $comment) {
            Comment::create($comment);
        }
    }
}
