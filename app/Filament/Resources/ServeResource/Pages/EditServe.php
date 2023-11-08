<?php

namespace App\Filament\Resources\ServeResource\Pages;

use App\Filament\Resources\ServeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServe extends EditRecord
{
    protected static string $resource = ServeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
