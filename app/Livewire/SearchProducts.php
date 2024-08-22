<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchProducts extends Component
{
    public $search = '';
    protected $queryString = ['search'];
    public function render()
    {
        if (strlen($this->search) < 1) {
            return view('livewire.search-products', ['products' => []]);
        }

        $products = Product::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->limit(8)->get();
        return view('livewire.search-products', ['products' => $products]);
    }
}
