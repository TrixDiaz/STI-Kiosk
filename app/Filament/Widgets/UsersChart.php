<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Revenue;

class UsersChart extends ChartWidget
{
    protected static ?string $heading = 'Monthly Income Revenue';

    protected static string $color = 'info';

    protected function getData(): array
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
                'label' => 'Monthly Income',
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
            'datasets' => $datasets,
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
