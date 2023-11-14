<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Revenue; // Assuming your Revenue model is in the App\Models namespace

class RevenuesChart extends ChartWidget
{
    protected static ?string $heading = 'Payment Types Distribution';

    protected function getData(): array
    {
        $paymentData = Revenue::selectRaw('COUNT(*) as count, payment_status')
            ->groupBy('payment_status')
            ->whereIn('payment_status', ['Cash', 'Gcash']) // Adjust payment types as needed
            ->get();

        $datasets = [
            [
                'label' => 'Payments',
                'data' => $paymentData->pluck('count')->toArray(),
                'backgroundColor' => [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                ],
            ],
        ];

        $labels = $paymentData->pluck('payment_status')->toArray();

        return [
            'datasets' => $datasets,
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
