<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Models\User;
use Filament\Actions;
use Illuminate\Support\Facades\Auth;
use App\Filament\Resources\UserResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Actions\Action;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        $place = $this->record;

        $auth = Auth::user();
        // Get a list of users with roles "admin" and "moderator"
        $usersWithRoles = User::whereHas('roles', function ($query) {
            $query->whereIn('id', [1, 2]);
        })->get();

        // Send the notification to each user
        foreach ($usersWithRoles as $user) {
            $notification = Notification::make()
                ->info()
                ->icon('heroicon-o-map-pin')
                ->title('User Resource Modified')
                ->body("User {$place->name} Modified by {$auth->name}!")
                ->actions([Action::make('View')->url(UserResource::getUrl('edit', ['record' => $place]))])
                ->sendToDatabase($user);
        }

        return $notification; // or return a notification if needed
    }
}
