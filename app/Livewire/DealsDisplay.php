<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Deal;
use Livewire\Component;

class DealsDisplay extends Component
{
    public $deals;
    public $latestCategory;

    public function mount()
    {
        // Fetching all deals with associated products and discount, limiting to 2 deals
        $this->deals = Deal::with('products')->limit(2)->get();

        // Fetching the deal with the highest discount value
        $this->latestCategory = Category::with('products')->first();
    }

    public function render()
    {
        return view('livewire.deals-display',['deals' => $this->deals, 'latestCategory' => $this->latestCategory]);
    }
}
