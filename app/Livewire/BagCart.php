<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart as CartModel;

class BagCart extends Component
{
    public $count = 0;



    public function render()
    {
          // Check if the user is logged in
          if (auth()->check()) {
            $userId = auth()->id();
            $cart = CartModel::where('user_id', $userId)->first();
            $this->count = $cart ? $cart->items->count() : 0;
        } else {
            $this->count = 0; // If not authenticated, set count to 0
        }
        return view('livewire.bag-cart', ['count' => $this->count]);
    }
}
