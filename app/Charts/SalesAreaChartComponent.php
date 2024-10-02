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
        // Get the start and end dates for the current month
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Query to get sales data for the current month
        $salesData = Order::selectRaw('DATE(created_at) as date, ROUND(SUM(total), 2) as total')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total', 'date')
            ->toArray();

        // Use Carbon to get the correct day names and ensure unique labels
        $labels = [];
        foreach ($salesData as $date => $total) {
            $dayName = Carbon::parse($date)->translatedFormat('l');
            // Only add unique day names
            if (!in_array($dayName, $labels)) {
                $labels[] = $dayName;
            }
        }

        // Ensure the total array aligns with the labels
        $totals = [];
        foreach ($labels as $label) {
            // Find the corresponding total for each label
            $date = Carbon::now()->startOfMonth()->startOfDay()->addDays(array_search($label, $labels));
            $totals[] = $salesData[$date->toDateString()] ?? 0;
        }

        return $this->chart->areaChart()
            ->addData('مبيعات', $totals)
            ->setColors(['#0ea5e9'])
            ->setLabels($labels)
            ->setStroke(1, ['#0ea5e9'], 'straight')
            // ->setGrid(opacity: '0.05')
            ->setMarkers(['#0ea5e9', '#0ea5e9'], 4, 6)
            ->setFontFamily('Zain');
    }
}
