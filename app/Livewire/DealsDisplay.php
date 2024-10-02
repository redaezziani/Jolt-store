<?php

namespace App\Livewire;

use App\Models\Deal;
use Livewire\Component;

class DealsDisplay extends Component
{
    public $deals;

    public function mount()
    {
        // Retrieve all deals from the database
        $this->deals = Deal::with('products')->limit(2)->get();
    }

    public function render()
    {
        return view('livewire.deals-display');
    }
}
