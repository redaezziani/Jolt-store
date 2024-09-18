<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\WithPagination;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;

class NewArrivals extends Component
{
    use WithPagination;

    public $filter = '';

    protected $queryString = ['filter'];

    public function applyFilter($filter)
    {
        $this->filter = $filter;
    }

    public function placeholder()
    {
        return <<<'html'
          <p> data ....</p>
          html;
    }

    public function render()
    {
        // Fetch products based on the filter
        if ($this->filter) {
            $query = Product::whereHas('category', function ($query) {
                $query->where('slug', $this->filter);
            })->orderBy('created_at', 'desc');
        } else {
            $query = Product::orderBy('created_at', 'desc');
        }
        $products = $query->paginate(10,pageName: 'new-arrivals');

        $categories = Category::inRandomOrder()->limit(4)->get();

        return view('livewire.new-arrivals', [
            'new_arrivals' => $products,
            'categories' => $categories
        ]);
    }
}
