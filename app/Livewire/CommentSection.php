<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CommentSection extends Component
{

    public function mount(Product $product)
    {
        $this->product = $product;
    }



    public function render()
    {
        $comments = Comment::where('product_id', $this->product->id)
            ->with('user') // Load the user who made the comment
            ->latest()
            ->get();

        return view('livewire.comment-section', [
            'comments' => $comments,
        ]);
    }

}
