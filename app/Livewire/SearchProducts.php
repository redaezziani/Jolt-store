<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchProducts extends Component
{
    public $search = '';

    public function render()
    {
        if (strlen($this->search) < 2) {
            return view('livewire.search-products', ['products' => []]);
        }

        $products = Product::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->get();
        return view('livewire.search-products', ['products' => $products]);
    }
}
