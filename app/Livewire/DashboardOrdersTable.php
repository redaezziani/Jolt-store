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
        // Paginate the orders here, not in mount the new orders will be fetched and with order_items
        $orders = Order::orderBy("id","desc")->with('items')->paginate(10);

        return view('livewire.dashboard-orders-table', [
            'orders' => $orders
        ]);
    }
}
