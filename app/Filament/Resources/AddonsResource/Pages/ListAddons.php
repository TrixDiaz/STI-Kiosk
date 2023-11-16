<?php

namespace App\Filament\Resources\AddonsResource\Pages;

use App\Filament\Resources\AddonsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAddons extends ListRecords
{
    protected static string $resource = AddonsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
