<?php

namespace App\Livewire;

use App\Models\OrderItem;
use Livewire\Component;

class TotalProductsSold extends Component
{
    public $totalProductsSold;

    public function mount()
    {
        // total sum quantity of products sold for this month
        $currentYear = now()->year;
        $currentMonth = now()->month;

        $this->totalProductsSold = OrderItem::whereYear('created_at', $currentYear)
        ->whereMonth('created_at', $currentMonth)->sum('quantity');

    }
    public function render()
    {
        return view('livewire.total-products-sold');
    }
}
