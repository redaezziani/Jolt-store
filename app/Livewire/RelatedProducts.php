<?php

namespace App\Livewire;

use Livewire\Component;

class RelatedProducts extends Component
{
    public $relatedProducts=[];
    public $product;
    // get the product id as props then
    public function mount($product)
    {
        $this->product = $product;
        // get a 6 random related products to the current show product .
        $this->relatedProducts =
         $product->category->products()
         ->where('id', '!=', $product->id)
         ->inRandomOrder()
         ->limit(12)->get();
    }
    public function render()
    {
        // render the blade code .
        return view('livewire.related-products');
    }
}
