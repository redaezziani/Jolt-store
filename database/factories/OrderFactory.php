<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Create a new user for each order
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'total' => round($this->faker->randomFloat(2, 20, 500), 2), // Random total between 20 and 500
            'status' => $this->faker->randomElement(['pending', 'processing', 'completed']),
            'phone' => $this->faker->phoneNumber,
            'city' => $this->faker->city,
            'type' => $this->faker->randomElement(['cash', 'credit_card']),
            'address' => $this->faker->address,
            'created_at' => $this->faker->dateTimeBetween('-30 days', 'now'), // Random date within the last 30 days
            'updated_at' => now(),
        ];
    }
}
