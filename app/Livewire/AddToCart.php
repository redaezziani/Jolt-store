<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart as CartModel;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use WireUi\Traits\Actions;

class AddToCart extends Component
{

    use Actions;
    public $product;
    public $size = '';
    public $color = '';
    public $quantity = 1;
    public $commentText;
    public $rating = 4;

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
            $this->notification()->error(
                $title = 'حدث خطأ',
                $description = 'حدث خطأ أثناء حذف التعليق.'
            );
            return;
        }

        if ($comment->user_id !== Auth::id()) {
            $this->notification()->error(
                $title = 'حدث خطأ',
                $description = 'لا يمكنك حذف تعليق لم تقم بإضافته.'
            );
            return;
        }

        $comment->delete();

        $this->notification()->success(
            $title = 'تم الحذف بنجاح',
            $description = 'تم حذف تعليقك بنجاح.'
        );
    }

    public function toggleVisibility($commentId)
{
    $comment = Comment::find($commentId);
    if (!$comment) {
        $this->notification()->error(
            $title = 'حدث خطأ',
            $description = 'لم يتم العثور على التعليق.'
        );
        return;
    }

    if ($comment->user_id !== Auth::id()) {
        $this->notification()->error(
            $title = 'حدث خطأ',
            $description = 'لا يمكنك تعديل تعليق لم تقم بإضافته.'
        );
        return;
    }

    // Toggle the visibility status
    $comment->status = $comment->status === 'show' ? 'hide' : 'show';
    $comment->save();

    $this->notification()->success(
        $title = 'تم التحديث بنجاح',
        $description = 'تم تغيير حالة التعليق بنجاح.'
    );
}

    public function setRating($rating)
    {
        $this->rating = $rating;
    }
    public function addComment()
    {



        // Validate the input data
        $this->validate();
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $ADD = Comment::create([
            'comment_text' => $this->commentText,
            'rating' => $this->rating,
            'product_id' => $this->product->id,
            'user_id' => Auth::id(), // Assuming the user is authenticated
        ]);

        if (!$ADD) {
            $this->notification()->error(
                $title = 'حدث خطأ',
                $description = 'حدث خطأ أثناء إضافة تعليقك على المنتج.'
            );
            return;
        }

        $this->commentText = '';
        $this->rating = 5;

        $this->notification()->success(
            $title = 'تمت الإضافة بنجاح',
            $description = 'تمت إضافة تعليقك بنجاح على المنتج.'
        );
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
            $this->notification()->error('حدث خطأ', 'حدث خطأ أثناء إضافة المنتج إلى السلة.');
            return;
        }

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Validate the inputs
        $this->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        // Handle the case where product does not have colors or sizes
        if (!$product->colors && !$product->sizes) {
            $this->color = '';
            $this->size = '';
        } else {
            // Default to the first available color and size if not selected
            if (!$this->color) {
                $this->color = $product->colors ? explode('@', $product->colors)[0] : '';
            }

            if (!$this->size) {
                $this->size = $product->sizes ? explode('@', $product->sizes)[0] : '';
            }
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
            $price = floatval($price);
            $discount = ($discountValue / 100) * $price;
            $price -= $discount;
        }

        $formattedPrice = number_format($price, 2);

        if ($cartItem) {
            $cartItem->quantity += $this->quantity;
            $cartItem->save();
        } else {
            $cart->items()->create([
                'product_id' => $productId,
                'quantity' => $this->quantity,
                'price' => $formattedPrice,
                'size' => $this->size,
                'color' => $this->color,
            ]);
        }

        $this->notification()->success('تمت الإضافة بنجاح', 'تمت إضافة المنتج إلى السلة بنجاح.');
        $this->color = '';
        $this->size = '';
        $this->quantity = 1;
    }



    public function render()
    {
        // Retrieve comments for the current product
        $comments = Comment::where('product_id', $this->product->id)
            ->with('user')
            ->latest()
            ->get();

        // Get total number of comments
        $totalComments = $comments->count();

        // Group ratings by their value and count how many times each rating was given
        $ratings = Comment::selectRaw('rating, COUNT(*) as count')
            ->where('product_id', $this->product->id)
            ->groupBy('rating')
            ->orderBy('rating', 'desc')
            ->limit(6) // Limit the results to 6
            ->get();

        return view('livewire.add-to-cart', [
            'selectedColor' => $this->color,
            'selectedSize' => $this->size,
            'currentQuantity' => $this->quantity,
            'comments' => $comments,
            'ratings' => $ratings,
            'totalComments' => $totalComments,
        ]);
    }
}
