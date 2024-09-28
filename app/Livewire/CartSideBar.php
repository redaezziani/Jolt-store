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
            return ($price - $discount) * $item->quantity;
        });
    }

    public function increaseQuantity($id) {
        $this->updateQuantity($id);
        $this->calculateTotal();
    }

    public function decreaseQuantity($id) {
        $this->updateQuantity($id, false);
        $this->calculateTotal();
    }

    public function removeFromCart($itemId)
    {
        CartItem::find($itemId)?->delete();
    }

    public function updateQuantity($itemId, $increment = true)
    {
        $cartItem = CartItem::find($itemId);
        if ($cartItem) {
            if ($increment && $cartItem->quantity < $this->quantityMax) {
                $cartItem->increment('quantity');
            } elseif (!$increment && $cartItem->quantity > $this->quantityMin) {
                $cartItem->decrement('quantity');
            }
            $cartItem->save();
        }
    }

    public function clearCart()
    {
        if (auth()->check()) {
            $cart = CartModel::where('user_id', auth()->id())->first();
            if ($cart) {
                $cart->items()->delete();
                $this->cartItems = collect();
                $this->total = 0;
            }
        }
    }

    public function render()
    {
        if (auth()->check()) {
            $cart = CartModel::where('user_id', auth()->id())->with('items.product.discounts')->first();
            if ($cart) {
                $this->cartItems = $cart->items;
                $this->calculateTotal();
            }
        }
        return view('livewire.cart-side-bar', [
            'cartItems' => $this->cartItems,
            'total' => $this->total,
        ]);
    }
}
