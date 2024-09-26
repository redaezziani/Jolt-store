<?php

namespace App\Charts;

use App\Models\Order; // Make sure to import your Order model
use ArielMejiaDev\LarapexCharts\LarapexChart;

class OrderStatusPieChartComponent
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        // Fetching real data from the database
        $pendingCount = Order::where('status', 'pending')->count();
        $processingCount = Order::where('status', 'processing')->count();
        $completedCount = Order::where('status', 'completed')->count();

        return $this->chart->donutChart()
            ->addData([$pendingCount, $processingCount, $completedCount]) // Dynamic data
            ->setLabels(['قيد الانتظار', 'قيد المعالجة', 'مكتمل']) // Arabic labels
            ->setColors(['#6366f1', '#3b6bd3', '#ff6384']) // Custom colors
            ->setFontFamily('Zain');
    }
}
