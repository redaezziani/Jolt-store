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
        $products = Product::orderBy('id', 'desc')->take(8)->get();

        $discounts = [
            ['name' => 'تخفيضات الصيف', 'value' => 15.00],
            ['name' => 'تخفيضات فلاش', 'value' => 20.00],
            ['name' => 'تصفية', 'value' => 30.00],
            ['name' => 'تخفيضات العطلات', 'value' => 25.00],
            ['name' => 'تخفيضات نهاية الموسم', 'value' => 18.00],
            ['name' => 'عرض محدود الوقت', 'value' => 22.00],
            ['name' => 'تخفيضات العودة إلى المدرسة', 'value' => 10.00],
            ['name' => 'تسخين الشتاء', 'value' => 28.00],
        ];

        // تعبئة الخصومات للـ 8 منتجات الأخيرة
        foreach ($products as $key => $product) {
            $discount = $discounts[$key % count($discounts)]; // التبديل بين الخصومات
            Discount::create([
                'name' => $discount['name'],
                'value' => $discount['value'],
                'product_id' => $product->id,
                'start_date' => Carbon::now()->subDays($key + 1), // تاريخ البدء من الأيام الماضية
                'end_date' => Carbon::now()->addDays($key + 7), // تاريخ الانتهاء بعد 7 أيام
            ]);
        }
    }
}
