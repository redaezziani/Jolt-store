<?php
namespace App\Livewire;

use App\Models\Comment;
use Livewire\Attributes\On;
use Livewire\Component;

class CommentsSheet extends Component
{
    public $comments = [];
    public $productId=null;

    #[On('comments-bar-open')]
    public function openCommentsBar($productId)
    {
        $this->productId = $productId;
        $this->loadComments($productId);
    }

    public function loadComments($productId)
    {
        $this->comments = Comment::where('product_id', $productId)->get();
    }

    public function render()
    {
        return view('livewire.comments-sheet');
    }
}
