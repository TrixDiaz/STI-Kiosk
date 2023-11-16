<?php

namespace App\Filament\Resources\AddonsResource\Pages;

use App\Filament\Resources\AddonsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAddons extends EditRecord
{
    protected static string $resource = AddonsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
