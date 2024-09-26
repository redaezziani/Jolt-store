<?php

namespace App\Livewire;

use App\Models\OrderItem;
use Livewire\Component;

class TotalProductsSold extends Component
{
    public $totalProductsSold;

    public function mount()
    {
        $this->totalProductsSold = OrderItem::sum('quantity');
    }
    public function render()
    {
        return view('livewire.total-products-sold');
    }
}
