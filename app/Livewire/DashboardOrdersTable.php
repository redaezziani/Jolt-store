<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;

class DashboardOrdersTable extends Component
{
    use WithPagination;

    public function render()
    {
        $currentYear = now()->year;
        $currentMonth = now()->month;  $currentYear = now()->year;
        $orders = Order::whereYear('created_at', $currentYear)->orderBy('created_at','desc')->with('items')->whereHas('items')->paginate(10);
        return view('livewire.dashboard-orders-table', [
            'orders' => $orders
        ]);
    }
}
