<?php

namespace App\Filament\Resources\ServeResource\Pages;

use App\Filament\Resources\ServeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServes extends ListRecords
{
    protected static string $resource = ServeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
