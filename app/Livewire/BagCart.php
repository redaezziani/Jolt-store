<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Cart as CartModel;

class BagCart extends Component
{
    public $count = 0;
    public function render()
    {
        // check if user is logged in and if he not have a cart yet create one
        if (auth()->check()) {
            // get the cart of the logged in user
            $cart = CartModel::where('user_id', auth()->id())->first();
            // if the user has a cart get the count of items in the cart
            if ($cart) {
                $this->count = $cart->items->count();
            }

            return view('livewire.bag-cart', ['count' => $this->count]);
        }
        return view('livewire.bag-cart', ['count' => $this->count]);
    }
}
