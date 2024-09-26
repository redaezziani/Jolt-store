<?php

namespace App\Livewire;

use App\Charts\UserBarChartComponent;
use Livewire\Component;

class UserBarChart extends Component
{
    public function render(UserBarChartComponent $chart)
    {
        return view('livewire.user-bar-chart',['chart' => $chart->build()]);
    }
}
