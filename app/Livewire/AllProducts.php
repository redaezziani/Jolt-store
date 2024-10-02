<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Product;

class AllProducts extends Component
{
    use WithPagination;

    public $filter = null;
    public $search = null;
    public $sortPrice = null;
    public $shipping = null;
    public $color = null;
    public $size = null;
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

    public function applyColorFilter($color)
    {
        $this->color = $color;
        $this->resetPage();
    }

    public function applySizeFilter($size)
    {
        $this->size = $size;
        $this->resetPage();
    }

    public function mount()
    {
        $sizes = Product::select('sizes')
            ->whereNotNull('sizes')
            ->distinct()
            ->pluck('sizes')
            ->toArray();

        $this->sizes = collect($sizes)
            ->flatMap(function ($size) {
                return explode('@', $size);
            })
            ->map(function ($size) {
                return trim($size);
            })
            ->unique()
            ->sort()
            ->values()
            ->toArray();

        $colors = Product::select('colors')
            ->whereNotNull('colors')
            ->distinct()
            ->pluck('colors')
            ->toArray();

        $this->colors = collect($colors)
            ->flatMap(function ($color) {
                return explode('@', $color);
            })
            ->map(function ($color) {
                return trim($color);
            })
            ->unique()
            ->sort()
            ->values()
            ->toArray();
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

    public function render()
    {
        $query = Product::query();

        if ($this->best){
         $data = Product::orderBy('rating', 'desc')->paginate(16);
        //  dd($data);
        }

        switch ($this->shipping) {
            case 1:
                $query->where('shipping', 'Free Shipping');
                break;
            case 2:
                $query->where('shipping', 'Paid Shipping');
                break;
            case 3:
                break;
            default:
                break;
        }

        if ($this->filter) {
            $query->whereHas('category', function ($query) {
                $query->where('slug', $this->filter);
            });
        }

        if (!empty($this->search)) {
            $query->where('name', 'like', '%' . $this->search . '%');
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
            case 5:
                break;
            default:
                break;
        }

        if ($this->color) {
            $query->where('colors', 'like', '%' . $this->color . '%');
        }
        if ($this->size) {
            $query->where('sizes', 'like', '%' . $this->size . '%');
        }
        $products = $query->orderBy('created_at', 'desc')->paginate(16,pageName: 'all-products');
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
