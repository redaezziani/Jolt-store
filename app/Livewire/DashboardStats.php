<?php

namespace App\Livewire;

use Livewire\Component;

class DashboardStats extends Component
{
    // lets get the : total orders count, and total revenue that is : sum of all orders total amount and number of the new customers that new customers are those who have registered in the last 30 days
    public $totalOrders, $totalRevenue, $newCustomers, $productsStock;
    public function render()
    {
        $this->totalOrders = \App\Models\Order::count();
        $this->totalRevenue = \App\Models\Order::sum('total');
        $this->newCustomers = \App\Models\User::where('created_at', '>=', now()->subDays(30))->count();
        $this->productsStock = \App\Models\Product::sum('stock');
        return view('livewire.dashboard-stats' , [
            'totalOrders' => $this->totalOrders,
            'totalRevenue' => $this->totalRevenue,
            'newCustomers' => $this->newCustomers,
            'productsStock' => $this->productsStock,
        ]);
    }
}
