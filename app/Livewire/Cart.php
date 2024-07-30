<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart as CartModel;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{
    public $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            return;
        }

        $cart = CartModel::firstOrCreate(['user_id' => Auth::id()]);
        $cartItem = $cart->items()->where('product_id', $productId)->first();
        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            $cart->items()->create([
                'product_id' => $productId,
                'quantity' => 1,
                'price' => $product->price,
            ]);
        }

        $this->emit('cartUpdated');
    }

    public function render()
    {
        // lets pass the product to the view
        return view('livewire.cart', ['product' => $this->product]);
    }
}
