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
    public $sortPrice = null;
    public $shipping = null;

    protected $queryString = ['filter', 'search', 'sortPrice', 'shipping'];

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

    public function applySortShipping ($applySortShipping)
    {
        $this->shipping = $applySortShipping;
        $this->resetPage(); // Reset pagination when sort changes
    }

    public function render()
    {
        $query = Product::query();

         switch ($this->shipping) {
            case 1:
                $query->where('shipping', 'Free Shipping');
                break;
            case 2:
                $query->where('shipping', 'Paid Shipping');
                break;
            default:
                $query->where('shipping', 'Free Shipping');
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
            default:
                $query->whereRaw('CAST(REPLACE(price, ",", ".") AS DECIMAL(10,2)) > ?', [0]);
                break;
        }
        $products = $query->orderBy('created_at', 'desc')->paginate(16);
        $categories = Category::inRandomOrder()->limit(4)->get();

        return view('livewire.all-products', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
?>
