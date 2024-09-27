<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Order; // Ensure you import your Order model
use Carbon\Carbon;

class SalesAreaChartComponent
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }
    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $salesData = Order::selectRaw('DATE(created_at) as date, ROUND(SUM(total), 2) as total')
            ->where('created_at', '>=', now()->subWeek())
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total', 'date')
            ->toArray();

        $labels = [];
        foreach ($salesData as $date => $total) {
            $labels[] = Carbon::parse($date)->translatedFormat('l');
        }

        return $this->chart->areaChart()
        ->addData('مبيعات', array_values($salesData))
        ->setColors(['#6366f1'])
        ->setLabels($labels)
        ->setStroke(1, ['#6366f1'], 'straight')
        ->setGrid(opacity: '0.05')
        ->setMarkers(['#ff6384', '#ff6384'], 4, 6)
        ->setFontFamily('Zain');
    }
}
