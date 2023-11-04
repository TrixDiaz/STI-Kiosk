<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class RevenuesChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Accounts created',
                    'data' => [45, 77, 89],
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                      ],
                ],
            ],
            'labels' => ['Cash', 'E-wallet', 'QR-Code',],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
