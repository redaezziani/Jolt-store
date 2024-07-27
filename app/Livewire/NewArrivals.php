<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class NewArrivals extends Component
{

    public function render()
    {
        // lets get the last 8 products
        $new_arrivals = Product::orderBy('created_at', 'desc')->take(8)->get();
        // Pass the data to the view
        return view('livewire.new-arrivals', ['new_arrivals' => $new_arrivals]);
    }
}

