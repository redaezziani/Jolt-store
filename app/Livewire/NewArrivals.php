<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\WithPagination;
use App\Models\Product;
use Livewire\Component;

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
        if ($this->filter) {
            $new_arrivals = Product::whereHas('category', function ($query) {
                $query->where('slug', $this->filter);
            })->orderBy('created_at', 'desc')->paginate(8);
        } else {
            $new_arrivals = Product::orderBy('created_at', 'desc')->paginate(8);
        }
        $categories = Category::inRandomOrder()->limit(4)->get();
        return view('livewire.new-arrivals', ['new_arrivals' => $new_arrivals, 'categories' => $categories]);
    }
}
