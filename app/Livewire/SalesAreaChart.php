<?php

namespace App\Livewire;

use App\Charts\SalesAreaChartComponent;
use Livewire\Component;

class SalesAreaChart extends Component
{
    public function render(SalesAreaChartComponent $chart)
    {
        return view('livewire.sales-area-chart',['chart' => $chart->build()]);
    }
}
