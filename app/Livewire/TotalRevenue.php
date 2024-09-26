<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class TotalRevenue extends Component
{
    public $totalRevenue;

    public function mount()
    {
        $this->totalRevenue = Order::sum('total');
    }
    public function render()
    {
        return view('livewire.total-revenue');
    }
}
