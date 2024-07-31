<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart as CartModel;
use App\Models\CartItem;
use App\Models\CartItems;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartSideBar extends Component
{
    public $cartItems;

    public function removeFromCart($itemId)
    {
        $cartItem = CartItem::find($itemId);
       // this is the cart item that we want to remove
        if ($cartItem) {
            $cartItem->delete();
            $this->cartItems = $this->cartItems->except($itemId);
        }
    }

    public function render()
    {
        if (auth()->check()) {
            $cart = CartModel::where('user_id', auth()->id())->first();
            if ($cart) {
                $this->cartItems = $cart->items;
            }
        }
        return view('livewire.cart-side-bar', ['cartItems' => $this->cartItems]);
    }
}
