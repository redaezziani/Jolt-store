<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class TotalRevenue extends Component
{
    public $totalRevenue;

    public function mount()
    {
        $this->totalRevenue = round(Order::sum('total'), 2);
    }
    public function render()
    {
        return view('livewire.total-revenue');
    }
}
