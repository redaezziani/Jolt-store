<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Create 50 random orders
        Order::factory()->count(110)->create();
    }
}
