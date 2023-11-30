<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use App\Filament\Widgets\UsersOverview;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Concerns\ExposesTableToWidgets;


class ListUsers extends ListRecords
{

    use ExposesTableToWidgets; 
    
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Create User'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            UsersOverview::class
        ];
    }

    public  function getTabs(): array
    {
        return [
            null => ListRecords\Tab::make('All'),
            'daily' => ListRecords\Tab::make('Today')->query(fn ($query) => $query->whereDate('created_at', today())),
            'monthly' => ListRecords\Tab::make('Monthly')->query(fn ($query) => $query->whereMonth('created_at', now()->month)),
            'yearly' => ListRecords\Tab::make('Yearly')->query(fn ($query) => $query->whereYear('created_at', now()->year)),
        ];
        
    }
}
