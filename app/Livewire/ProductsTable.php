<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
class ProductsTable extends Component
{
    use Actions;
    use WithPagination;

    public $search = "";

    protected $queryString = ['search'];

    public function  deleteProduct($id)
    {
        // first check if the product exists
        if (Product::find($id)) {
            // if it exists, delete it
            Product::find($id)->delete();
            $this->dispatch('close-product-delete-model');
        }

        $this->notification()->success(
            $title = 'تم إنشاء الخصم بنجاح',
            $description = 'تم إنشاء الخصم الخاص بك بنجاح'
        );
        $this->dispatch('close-product-delete-model');
    }

    public function deleteAllProducts()
    {
        // lets delete all products
        Product::truncate(); // this will delete all products
    }

    public function render()
    {
        if ($this->search) {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->paginate(9);
        } else {
            $products = Product::paginate(9);
        }
        return view('livewire.products-table', compact('products'));
    }
}
