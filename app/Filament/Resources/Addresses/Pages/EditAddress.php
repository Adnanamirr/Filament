<?php

namespace App\Filament\Resources\Addresses\Pages;

use App\Filament\Resources\Addresses\AddressResource;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditAddress extends EditRecord
{
    protected static string $resource = AddressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Address Updated')
            ->body('An Address was edited successfully.')
            ->duration(5000)
            ->info()
            ->color('info');

    }
}
