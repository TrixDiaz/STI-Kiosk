<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class UsersOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Card::make('Total User', 12),
            Card::make('Total Roles', 10),
            Card::make('Total Permission', 1),
        ];
    }
}
