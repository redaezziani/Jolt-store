<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class TotalOrders extends Component
{
    public $totalOrders=0;

    public function mount()
    {
        $currentYear = now()->year;
        $currentMonth = now()->month;
        $this->totalOrders = Order::whereYear('created_at', $currentYear)
        ->whereMonth('created_at', $currentMonth)->count();
    }
    public function render()
    {
        return view('livewire.total-orders');
    }
}
