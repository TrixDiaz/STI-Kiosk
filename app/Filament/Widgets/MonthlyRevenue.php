<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use App\Models\Revenue;

class MonthlyRevenue extends ApexChartWidget
{
    protected static string $chartId = 'monthlyRevenue';
    protected static ?string $heading = 'Monthly Revenue';

    protected function getOptions(): array
    {
        $monthlyData = Revenue::selectRaw('SUM(total) as total_income, MONTH(created_at) as month')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Sort data by month to ensure labels are in the correct order
        $monthlyData = $monthlyData->sortBy('month');

        $datasets = [
            [
                'name' => 'MonthlyRevenue',
                'data' => $monthlyData->pluck('total_income')->toArray(),
            ],
        ];

        $labels = $monthlyData->pluck('month')->map(function ($month) {
            return date('M', mktime(0, 0, 0, $month, 1));
        })->toArray();

        // Reorder the months so that labels start from January
        $orderedLabels = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ];

        $labels = array_merge($orderedLabels, array_diff($labels, $orderedLabels));

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
            ],
            'series' => $datasets,
            'xaxis' => [
                'categories' => $labels,
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'colors' => ['#f59e0b'],
        ];
    }
}
