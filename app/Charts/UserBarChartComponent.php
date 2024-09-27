<?php

namespace App\Charts;

use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class UserBarChartComponent
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // Get user registration data grouped by month
        $userData = User::selectRaw('DATE(created_at) as date, COUNT(*) as total') // Count users
            ->where('created_at', '>=', now()->startOfMonth()) // Filter for the current month
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total', 'date') // Get total per date
            ->toArray();

        // Prepare the x-axis labels (dates)
        $labels = [];
        foreach ($userData as $date => $total) {
            $labels[] = Carbon::parse($date)->translatedFormat('l'); // Day names for labels
        }

        // Build the bar chart
        return $this->chart->barChart()
            ->addData('عدد المستخدمين', array_values($userData)) // Use the fetched user data
            ->setColors(['#ff6384']) // Set chart color
            ->setLabels($labels)
            ->setHeight(280) // Set chart height
            ->setFontFamily('Zain'); // Set font family
    }
}
