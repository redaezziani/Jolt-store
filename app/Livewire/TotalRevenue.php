<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class TotalRevenue extends Component
{
    public $totalRevenue;

    public function mount()
    {
        // total revenue for this month
        $currentYear = now()->year;
        $currentMonth = now()->month;
        $this->totalRevenue = Order::whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->where('status', 'completed')
            ->sum('total');
        $this->totalRevenue = round($this->totalRevenue, 2);
    }
    public function render()
    {
        return view('livewire.total-revenue');
    }
}
