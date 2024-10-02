<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Livewire\WithPagination;

class AllProducts extends Component
{
    use WithPagination;
    public $filter = null;
    public $search = null;
    public $sortPrice = null;
    public $shipping = null;
    public $color = null;
    public $size = null;
    public $best = null;
    public $sizes = [];
    public $colors = [];

    public $amount = 12;
    public $isLoading = false;

    protected $queryString = [
        'filter' => ['as' => 'filter_category'],
        'search' => ['as' => 'filter_search'],
        'sortPrice' => ['as' => 'sort_price'],
        'shipping' => ['as' => 'filter_shipping'],
        'color' => ['as' => 'filter_color'],
        'size' => ['as' => 'filter_size'],
        'best' => ['as' => 'best_products'],
    ];

    public function mount()
    {
        // Initialize size and color filters
        $this->initializeFilters();
    }

    public function applySizeFilter($size)
    {
        $this->size = $size; // Update the size state
        $this->resetPage();   // Reset pagination when the filter changes
    }

    public function applyColorFilter($color)
    {
        $this->color = $color;
        $this->resetPage();
    }

    public function applySort($sortPrice)
    {
        $this->sortPrice = $sortPrice;
        $this->resetPage();
    }

    public function applySortShipping($shipping)
    {
        $this->shipping = $shipping;
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->filter = null;
        $this->search = null;
        $this->sortPrice = null;
        $this->shipping = null;
        $this->color = null;
        $this->size = null;

        $this->resetPage();
        $this->reset('filter', 'search', 'sortPrice', 'shipping', 'color', 'size');
    }
    protected function initializeFilters()
    {
        $this->sizes = Product::distinct()->pluck('sizes')->flatMap(fn($size) => explode('@', $size))->map(fn($size) => trim($size))->unique()->sort()->values()->toArray();
        $this->colors = Product::distinct()->pluck('colors')->flatMap(fn($color) => explode('@', $color))->map(fn($color) => trim($color))->unique()->sort()->values()->toArray();
    }

    public function loadMore()
    {
        $this->isLoading = true;
        $this->amount += 8;

        sleep(0.5);
        $this->isLoading = false;
    }

    public function render()
    {
        $query = Product::query();

        if ($this->filter) {
            $query->whereHas('category', fn($query) => $query->where('slug', $this->filter));
        }

        if (!empty($this->search)) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        switch ($this->shipping) {
            case 1:
                $query->where('shipping', 'Free Shipping');
                break;
            case 2:
                $query->where('shipping', 'Paid Shipping');
                break;
                // case 3: No filter applied
        }

        switch ($this->sortPrice) {
            case 1:
                $query->whereRaw('CAST(REPLACE(price, ",", ".") AS DECIMAL(10,2)) < ?', [50]);
                break;
            case 2:
                $query->whereRaw('CAST(REPLACE(price, ",", ".") AS DECIMAL(10,2)) BETWEEN ? AND ?', [50, 100]);
                break;
            case 3:
                $query->whereRaw('CAST(REPLACE(price, ",", ".") AS DECIMAL(10,2)) BETWEEN ? AND ?', [100, 200]);
                break;
            case 4:
                $query->whereRaw('CAST(REPLACE(price, ",", ".") AS DECIMAL(10,2)) > ?', [200]);
                break;
                // case 5: No filter applied
        }

        if ($this->color) {
            $query->where('colors', 'like', '%' . $this->color . '%');
        }
        if ($this->size) {
            $query->where('sizes', 'like', '%' . $this->size . '%');
        }

        $products = $query->orderBy('created_at', 'desc')->paginate($this->amount);

        $categories = Category::limit(5)->get();

        return view('livewire.all-products', [
            'products' => $products,
            'categories' => $categories,
            'sizes' => $this->sizes,
            'colors' => $this->colors,
            'selectedCategory' => $this->filter,
            'selectedSortPrice' => $this->sortPrice,
            'selectedShipping' => $this->shipping,
            'selectedColor' => $this->color,
            'selectedSize' => $this->size,
        ]);
    }
}
