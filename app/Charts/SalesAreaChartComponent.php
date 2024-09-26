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
        // Get sales data from the orders table with rounded totals
        $salesData = Order::selectRaw('DATE(created_at) as date, ROUND(SUM(total), 2) as total') // Round the total to 2 decimal places
            ->where('created_at', '>=', now()->subWeek()) // Filter for the past week
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total', 'date') // Get total per date
            ->toArray();

        // Prepare the x-axis labels (dates)
        $labels = [];
        foreach ($salesData as $date => $total) {
            $labels[] = Carbon::parse($date)->translatedFormat('l'); // Translated day names (e.g., Monday, Tuesday)
        }

        // Build the area chart
        return $this->chart->areaChart()
            ->addData('مبيعات', array_values($salesData)) // Use the fetched sales data
            ->setColors(['#6366f1']) // Set chart color
            ->setLabels($labels) // Set labels for the x-axis
            ->setFontFamily('Zain'); // Set font family
    }
}
