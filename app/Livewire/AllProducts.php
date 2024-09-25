<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Product;

class AllProducts extends Component
{
    use WithPagination;

    public $filter = ''; // Category filter
    public $search = ''; // Search keyword
    public $sortPrice = null; // Price sorting
    public $shipping = null; // Shipping filter
    public $color = null; // Color filter
    public $size = null; // Size filter

    public $best=null;
    public $sizes = [];
    public $colors = [];

    protected $queryString = [
        'filter' => ['as' => 'filter_category'],
        'search' => ['as' => 'filter_search'],
        'sortPrice' => ['as' => 'sort_price'],
        'shipping' => ['as' => 'filter_shipping'],
        'color' => ['as' => 'filter_color'],
        'size' => ['as' => 'filter_size'],
        'best'=> ['as'=>'best_products'],
    ];


    public function applyFilter($filter)
    {
        $this->filter = $filter;
        $this->resetPage(); // Reset pagination when filter changes
    }

    public function applySort($sortPrice)
    {
        $this->sortPrice = $sortPrice;
        $this->resetPage(); // Reset pagination when sort changes
    }

    public function applySortShipping($shipping)
    {
        $this->shipping = $shipping;
        $this->resetPage(); // Reset pagination when shipping filter changes
    }

    public function applyColorFilter($color)
    {
        $this->color = $color;
        $this->resetPage(); // Reset pagination when color filter changes
    }

    public function applySizeFilter($size)
    {
        $this->size = $size;
        $this->resetPage(); // Reset pagination when size filter changes
    }

    public function mount()
    {
        // Fetch all distinct sizes from products
        $sizes = Product::select('sizes')
            ->whereNotNull('sizes') // Ensure size is not null
            ->distinct()
            ->pluck('sizes')
            ->toArray();

        // Process sizes to handle potential formatting issues and duplicates
        $this->sizes = collect($sizes)
            ->flatMap(function ($size) {
                // Handle cases where sizes might be separated by special delimiters
                return explode('@', $size); // Split sizes if they are separated by '@' or other delimiters
            })
            ->map(function ($size) {
                return trim($size); // Trim any extra spaces
            })
            ->unique()
            ->sort() // Optional: sort sizes if needed
            ->values()
            ->toArray();

        // Fetch all distinct colors from products
        $colors = Product::select('colors')
            ->whereNotNull('colors') // Ensure color is not null
            ->distinct()
            ->pluck('colors')
            ->toArray();

        // Process colors to handle potential formatting issues and duplicates
        $this->colors = collect($colors)
            ->flatMap(function ($color) {
                // Handle cases where colors might be separated by special delimiters
                return explode('@', $color); // Split colors if they are separated by '@' or other delimiters
            })
            ->map(function ($color) {
                return trim($color); // Trim any extra spaces
            })
            ->unique()
            ->sort() // Optional: sort colors if needed
            ->values()
            ->toArray();
    }

    public function resetFilters()
    {
        $this->filter = '';
        $this->search = '';
        $this->sortPrice = null;
        $this->shipping = null;
        $this->color = null;
        $this->size = null;

        $this->resetPage();
        $this->reset('filter', 'search', 'sortPrice', 'shipping', 'color', 'size');
    }

    public function render()
    {
        $query = Product::query();

        if ($this->best){
         $data = Product::orderBy('rating', 'desc')->paginate(16);
        //  dd($data);
        }

        // Apply shipping filter
        switch ($this->shipping) {
            case 1:
                $query->where('shipping', 'Free Shipping');
                break;
            case 2:
                $query->where('shipping', 'Paid Shipping');
                break;
            case 3:
                // this is get all products
                break;
            default:
                // No shipping filter applied
                break;
        }

        // Apply category filter
        if ($this->filter) {
            $query->whereHas('category', function ($query) {
                $query->where('slug', $this->filter);
            });
        }

        // Apply search filter
        if (!empty($this->search)) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }



        // Apply price sorting
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
            case 5:
                // this is get all products

                break;
            default:
                // No price filter applied
                break;
        }

        // Apply color filter
        if ($this->color) {
            $query->where('colors', 'like', '%' . $this->color . '%');
        }

        // Apply size filter
        if ($this->size) {
            $query->where('sizes', 'like', '%' . $this->size . '%');
        }

        // Get products with sorting and pagination
        $products = $query->orderBy('created_at', 'desc')->paginate(16);

        // Fetch categories for display
        $categories = Category::inRandomOrder()->limit(4)->get();

        return view('livewire.all-products', [
            'products' => $products,
            'categories' => $categories,
            'sizes' => $this->sizes,
            'colors' => $this->colors,
        ]);
    }
}
