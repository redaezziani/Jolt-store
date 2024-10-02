<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class SearchProducts extends Component
{
    use WithPagination;
    public $search = '';
    protected $queryString = ['search' => ['as' => 'product-search']];

    public function render()
    {
        // Initialize an empty collection to hold products
        $products = collect();

        if (strlen($this->search) > 0) {
            // Execute the search query
            $products = Product::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->paginate(5,pageName:'search-products');
        }

        return view('livewire.search-products', ['products' => $products]);
    }
}
