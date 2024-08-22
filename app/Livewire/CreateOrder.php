<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CreateOrder extends Component
{
    public $phone;
    public $city;
    public $address;
    public $cartItems = [];
    public $total = 0;

    public function mount()
    {
        $this->loadCartItems();
    }

    public function loadCartItems()
    {
        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->id())->first();
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

    public function createOrder()
    {
        $this->validate([
            'phone' => 'required|string|max:15',
            'city' => 'required|string|max:100',
            'address' => 'required|string|max:255',
        ]);

        if ($this->cartItems && auth()->check()) {
            // Create the order
            $order = Order::create([
                'user_id' => auth()->id(),
                'total' => $this->total,
                'status' => 'pending',
                'phone' => $this->phone,
                'city' => $this->city,
                'address' => $this->address,
            ]);

            // Create order items
            foreach ($this->cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }

            // Optionally, clear the cart after order creation
            $this->clearCart();

            // Redirect or notify the user
            session()->flash('message', 'Order created successfully!');
            return redirect()->route('order-success');
        }
    }

    public function clearCart()
    {
        $cart = Cart::where('user_id', auth()->id())->first();
        if ($cart) {
            $cart->items()->delete();
        }
    }

    public function render()
    {
        return view('livewire.create-order', [
            'cartItems' => $this->cartItems,
            'total' => $this->total,
        ]);
    }
}
