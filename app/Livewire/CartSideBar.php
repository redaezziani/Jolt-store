<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart as CartModel;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartSideBar extends Component
{
    public $cartItems = [];
    public $total = 0;

    public function mount()
    {
        $this->loadCartItems();
    }

    public function loadCartItems()
    {
        if (auth()->check()) {
            $cart = CartModel::where('user_id', auth()->id())->first();
            if ($cart) {
                $this->cartItems = $cart->items;
                $this->calculateTotal();
            }
        }
    }

    public function calculateTotal()
    {
        $this->total = 0; // Reset the total before recalculating
        foreach ($this->cartItems as $item) {
            $discountValue = optional($item->product->discounts->last())->value ?? 0;
            $price = (float) $item->product->price;
            $discount = ($discountValue / 100) * $price;
            $newPrice = $price - $discount;
            $this->total += $newPrice * $item->quantity;
        }
    }

    public function removeFromCart($itemId)
    {
        $cartItem = CartItem::find($itemId);
        if ($cartItem) {
            $cartItem->delete();
            $this->loadCartItems(); // Reload the cart items and recalculate the total after removing the item
        }
    }

    public function clearCart()
    {
        if (auth()->check()) {
            $cart = CartModel::where('user_id', auth()->id())->first();
            if ($cart) {
                // Delete all cart items for the current user's cart
                $cart->items()->delete();

                // Reset the cart items and total
                $this->cartItems = [];
                $this->total = 0;

                // Optionally, you can also delete the cart itself
                // $cart->delete();
            }
        }
    }

    public function checkout()
    {
        return redirect()->route('order-index');
    }

    public function render()
    {
        return view('livewire.cart-side-bar', [
            'cartItems' => $this->cartItems,
            'total' => $this->total,
        ]);
    }
}

?>
