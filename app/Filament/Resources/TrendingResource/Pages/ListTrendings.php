<?php

namespace App\Filament\Resources\TrendingResource\Pages;

use App\Filament\Resources\TrendingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrendings extends ListRecords
{
    protected static string $resource = TrendingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
