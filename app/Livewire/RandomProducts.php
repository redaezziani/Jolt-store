<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class RandomProducts extends Component
{
    public function render()
    {
        $randomProducts = Product::inRandomOrder()->take(4)->get();
        return view('livewire.random-products', compact('randomProducts'));
    }
}
