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
        $currentYear = now()->year;
        $currentMonth = now()->month;

        // Count pending orders for the current month and year
        $pendingCount = Order::where('status', 'pending')
            ->whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->count();

        $processingCount = Order::where('status', 'processing')
            ->whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->count();
        $completedCount = Order::where('status', 'completed')
            ->whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->count();

        return $this->chart->donutChart()
            ->addData([$pendingCount, $processingCount, $completedCount])
            ->setLabels(['قيد الانتظار', 'قيد المعالجة', 'مكتمل'])
            ->setColors(['#0ea5e9', '#fb923c', '#ff6384'])
            ->setFontFamily('Zain');
    }
}
