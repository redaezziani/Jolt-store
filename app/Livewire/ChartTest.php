<?php

namespace App\Livewire;

use App\Charts\MonthlyUsersChart;
use Livewire\Component;

class ChartTest extends Component
{
    public function render(MonthlyUsersChart $chart)
    {
        return view('livewire.chart-test', ['chart' => $chart->build()]);
    }
}
