<?php

namespace App\Filament\Resources\Clients\Pages;

use App\Filament\Resources\Clients\ClientResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditClient extends EditRecord
{
    protected static string $resource = ClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Client Updated')
            ->body('A Client was edited successfully.')
            ->duration(5000)
            ->info()
            ->color('info')
            ->actions([
                Action::make('view')->button()->url(fn() =>ClientResource::getUrl('view' ,['record' => $this->getRecord()])),
            ]);

    }
}
