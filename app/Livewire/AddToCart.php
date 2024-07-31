<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart as CartModel;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class AddToCart extends Component
{
    public $product;

    protected $listeners = ['addToCart', 'removeFromCart'];

    public function mount($product)
    {
        $this->product = $product;
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            return;
        }
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $cart = CartModel::firstOrCreate(['user_id' => Auth::id()]);
        $cartItem = $cart->items()->where('product_id', $productId)->first();
        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();

          // lets dispatch
          /*
           x-on:open-toast-notification.window="
        openToast($event.detail.variant, $event.detail.title, $event.detail.message);
    "
          */

            $this->dispatch('open-toast-notification', [
                'variant' => 'success',
                'title' => 'Success',
                'message' => 'Product added to cart',
            ]);
        } else {
            $cart->items()->create([
                'product_id' => $productId,
                'quantity' => 1,
                'price' => $product->price,
            ]);

            $this->dispatch('open-toast-notification', [
                'variant' => 'success',
                'title' => 'Success',
                'message' => 'Product added to cart',
            ]);


        }
    }



    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
