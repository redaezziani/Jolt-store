<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart as CartModel;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AddToCart extends Component
{
    public $product;
    public $size = '';
    public $color = '';
    public $quantity = 1;
    public $commentText;
    public $rating = 5; // Default rating

    protected $rules = [
        'commentText' => 'required|min:3',
        'rating' => 'required|integer|between:1,5',
    ];


    protected $queryString = ['size', 'color', 'quantity'];
    protected $listeners = ['addToCart', 'removeFromCart'];

    public function mount($product)
    {
        $this->product = $product;
    }

    public function deleteComment($commentId)
    {
        $comment = Comment::find($commentId);
        if (!$comment) {
            return;
        }

        if ($comment->user_id !== Auth::id()) {
            return;
        }

        $comment->delete();
    }
    public function addComment()
    {
        // Validate the input data
        $this->validate();
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        Comment::create([
            'comment_text' => $this->commentText,
            'rating' => $this->rating,
            'product_id' => $this->product->id,
            'user_id' => Auth::id(), // Assuming the user is authenticated
        ]);

        // Reset the form
        $this->commentText = '';
        $this->rating = 5;

        // Emit event for comment update
        session()->flash('message', 'Comment added successfully!');
    }
    public function setSize($size)
    {
        $this->size = $size;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
    public function addToCart($productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            // Optionally dispatch an error notification here
            return;
        }

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $this->validate([
            'size' => 'required|string',
            'color' => 'required|string',
            'quantity' => 'required|integer|min:1'
        ]);

        // if no color or size is selected, use the first available color and size
        if (!$this->color || !$this->size) {
            $this->color = explode('@', $product->colors)[0];
            $this->size = explode('@', $product->sizes)[0];
        }


        $cart = CartModel::firstOrCreate(['user_id' => Auth::id()]);
        $cartItem = $cart->items()->where('product_id', $productId)
            ->where('size', $this->size)
            ->where('color', $this->color)
            ->first();

        $price = $product->price;
        $discountValue = optional($product->discounts->last())->value;
        if ($discountValue) {
            $discountValue = floatval($discountValue);
            $price = floatval($price); // Ensure $price is a float
            $discount = ($discountValue / 100) * $price; // Calculate discount without using number_format
            $price -= $discount; // Subtract the discount from the original price
            $price = number_format($price, 2); // Format the final price to 2 decimal places
        }

        $price = floatval($price);
        $price = number_format($price, 2);

        if ($cartItem) {
            $cartItem->quantity += $this->quantity;
            $cartItem->save();
        } else {
            $cart->items()->create([
                'product_id' => $productId,
                'quantity' => $this->quantity,
                'price' => $price,
                'size' => $this->size,
                'color' => $this->color,
            ]);
        }

        $this->dispatch('open-toast-notification', [
            'variant' => 'success',
            'title' => 'تمت الإضافة بنجاح',
            'message' => 'تم إضافة المنتج إلى السلة.',
        ]);

        // reset the selected color, size, and quantity
        $this->color = '';
        $this->size = '';
        $this->quantity = 1;
    }


    public function render()
    {
        $comments = Comment::where('product_id', $this->product->id)
            ->with('user') // Load the user who made the comment
            ->latest()
            ->get();
        // send the selected color and size to the view
        return view('livewire.add-to-cart', [
            'selectedColor' => $this->color,
            'selectedSize' => $this->size,
            'currentQuantity' => $this->quantity,
            'comments' => $comments,
        ]);
    }
}
