<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Charts\OrderStatusPieChartComponent;
class OrderStatusPieChart extends Component
{



    public function render(OrderStatusPieChartComponent $chart)
    {
        return view('livewire.order-status-pie-chart',['chart' => $chart->build()]);
    }
}
