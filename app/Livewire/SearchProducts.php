<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class SearchProducts extends Component
{
    use WithPagination;
    public $search = '';
    protected $queryString = ['search' =>['as'=> 'product-search']];

    public function render()
    {
        if (strlen($this->search) < 1) {
            return view('livewire.search-products', ['products' => []]);
        }

        $products = Product::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->paginate(4);


        return view('livewire.search-products', ['products' => $products]);
    }
}
