<?php

namespace App\Filament\Resources\TrendingResource\Pages;

use App\Filament\Resources\TrendingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrending extends EditRecord
{
    protected static string $resource = TrendingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
