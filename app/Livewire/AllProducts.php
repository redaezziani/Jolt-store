<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Product;

class AllProducts extends Component
{
    use WithPagination;

    public $filter = '';
    public $search = '';

    protected $queryString = ['filter', 'search'];

    public function applyFilter($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $query = Product::query();
        // if the filter is not empty and the search input is empty
        if ($this->filter && empty($this->search)) {
            $query->whereHas('category', function ($query) {
                $query->where('slug', $this->filter);
            });
        }
        // if the search input is not empty and more than 2 characters
        if (!empty($this->search)) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $products = $query->orderBy('created_at', 'desc')->paginate(8);
        $categories = Category::inRandomOrder()->limit(4)->get();

        return view('livewire.all-products', ['products' => $products, 'categories' => $categories]);
    }
}
