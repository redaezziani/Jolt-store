<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class BestProducts extends Component
{
    use WithPagination;
    public function render()
    {
        // lets gett the best products that have the highest rating
        $best_products = Product::orderBy('rating', 'desc')->paginate(10,pageName: 'best-products');
        return view('livewire.best-products', compact('best_products'));
    }
}
