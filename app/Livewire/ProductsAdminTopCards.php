<?php
namespace App\Livewire;

use App\Models\OrderItem;
use Livewire\Component;
use App\Models\Product;

class ProductsAdminTopCards extends Component
{
    public $totalProducts = 0;
    public $productsOrdered = 0; // Assuming you have an Order or similar tracking products ordered
    public $totalStock = 0; // Total stock across all products
    public $productsWithDiscount = 0; // Total products with discounts

    public function mount()
    {
        $this->totalProducts = Product::count();
        $this->productsOrdered = OrderItem::distinct('product_id')->count('product_id'); 
        $this->totalStock = Product::sum('quantity');
        $this->productsWithDiscount = Product::whereHas('discounts')->count();
    }

    public function render()
    {
        return view('livewire.products-admin-top-cards');
    }
}
