<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart as CartModel;
use Illuminate\Support\Facades\Cache;

class BagCart extends Component
{
    public $count = 0;

    public function render()
    {
        // check if user is logged in
        if (auth()->check()) {
            $userId = auth()->id();
            $this->count = Cache::remember("cart_count_{$userId}", 300, function () use ($userId) {
                $cart = CartModel::where('user_id', $userId)->first();
                return $cart ? $cart->items->count() : 0;
            });

            return view('livewire.bag-cart', ['count' => $this->count]);
        }

        return view('livewire.bag-cart', ['count' => $this->count]);
    }
}
