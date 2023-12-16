<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use App\Models\Revenue; // Assuming your Revenue model is in the App\Models namespace

class PaymentChart extends ApexChartWidget
{
    protected static string $chartId = 'paymentChart';
    protected static ?string $heading = 'PaymentChart';

    protected function getOptions(): array
    {
        $paymentData = Revenue::selectRaw('COUNT(*) as count, payment_status')
            ->groupBy('payment_status')
            ->whereIn('payment_status', ['Cash', 'Gcash']) // Adjust payment types as needed
            ->get();

        $datasets = [
            [
                'name' => 'Payments',
                'data' => $paymentData->pluck('count')->toArray(),
            ],
        ];

        $labels = $paymentData->pluck('payment_status')->toArray();

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
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 3,
                    'horizontal' => true,
                ],
            ],
        ];
    }
}
