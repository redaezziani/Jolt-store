<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart as CartModel;
use App\Models\CartItem;
use Illuminate\Support\Collection; // Import Collection

class CartSideBar extends Component
{
    /** @var Collection $cartItems */
    public $cartItems;

    public $total = 0;
    public $quantityMin = 1;
    public $quantityMax = 10;

    public function mount()
    {
        // Initialize $cartItems as a collection
        $this->cartItems = collect();
        $this->loadCartItems();
    }

    public function loadCartItems()
    {
        if (auth()->check()) {
            $cart = CartModel::where('user_id', auth()->id())->with('items.product.discounts')->first();
            if ($cart) {
                $this->cartItems = $cart->items; // This is already a collection
                $this->calculateTotal();
            }
        }
    }

    public function calculateTotal()
    {
        $this->total = $this->cartItems->sum(function ($item) {
            $discountValue = optional($item->product->discounts->last())->value ?? 0;
            $price = (float) $item->product->price;
            $discount = ($discountValue / 100) * $price;
            $newPrice = $price - $discount;
            return $newPrice * $item->quantity;
        });
    }

    public function removeFromCart($itemId)
    {
        $cartItem = CartItem::find($itemId);
        if ($cartItem) {
            $cartItem->delete();
            $this->loadCartItems();
        }
    }

    public function decreaseQuantity($itemId)
    {
        $cartItem = CartItem::find($itemId);
        if ($cartItem && $cartItem->quantity > $this->quantityMin) {
            $cartItem->quantity--;
            $cartItem->save();
            $this->loadCartItems();
        }
    }

    public function increaseQuantity($itemId)
    {
        $cartItem = CartItem::find($itemId);
        if ($cartItem && $cartItem->quantity < $this->quantityMax) {
            $cartItem->quantity++;
            $cartItem->save();
            $this->loadCartItems();
        }
    }

    public function clearCart()
    {
        if (auth()->check()) {
            $cart = CartModel::where('user_id', auth()->id())->first();
            if ($cart) {
                $cart->items()->delete();
                $this->cartItems = collect(); // Reset to an empty collection
                $this->total = 0;
            }
        }
    }


    public function render()
    {
        return view('livewire.cart-side-bar', [
            'cartItems' => $this->cartItems,
            'total' => $this->total,
        ]);
    }
}
