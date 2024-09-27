<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart as CartModel;
use App\Models\CartItem;
use Illuminate\Support\Collection;

class CartSideBar extends Component
{
    /** @var Collection $cartItems */
    public $cartItems;

    public $total = 0;
    public $quantityMin = 1;
    public $quantityMax = 10;

    public function calculateTotal()
    {
        $this->total = $this->cartItems->sum(function ($item) {
            $discountValue = optional($item->product->discounts->last())->value ?? 0;
            $price = (float) $item->product->price;
            $discount = ($discountValue / 100) * $price;
            return ($price - $discount) * $item->quantity; // Calculate new price and multiply by quantity
        });
    }

    public function removeFromCart($itemId)
    {
        CartItem::find($itemId)?->delete(); // Use null safe operator
    }

    public function updateQuantity($itemId, $increment = true)
    {
        $cartItem = CartItem::find($itemId);
        if ($cartItem) {
            if ($increment && $cartItem->quantity < $this->quantityMax) {
                $cartItem->increment('quantity'); // Increase quantity
            } elseif (!$increment && $cartItem->quantity > $this->quantityMin) {
                $cartItem->decrement('quantity'); // Decrease quantity
            }
            $cartItem->save();
        }
    }

    public function clearCart()
    {
        if (auth()->check()) {
            $cart = CartModel::where('user_id', auth()->id())->first();
            if ($cart) {
                $cart->items()->delete(); // Delete all cart items
                $this->cartItems = collect(); // Reset to an empty collection
                $this->total = 0; // Reset total
            }
        }
    }

    public function render()
    {
        if (auth()->check()) {
            $cart = CartModel::where('user_id', auth()->id())->with('items.product.discounts')->first();
            if ($cart) {
                $this->cartItems = $cart->items; // This is already a collection
                $this->calculateTotal();
            }
        }
        return view('livewire.cart-side-bar', [
            'cartItems' => $this->cartItems,
            'total' => $this->total,
        ]);
    }
}
