<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class TotalOrders extends Component
{
    public $totalOrders=0;

    public function mount()
    {
        $this->totalOrders = Order::count();
    }
    public function render()
    {
        return view('livewire.total-orders');
    }
}
