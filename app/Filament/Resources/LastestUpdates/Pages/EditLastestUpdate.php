<?php

namespace App\Filament\Resources\LastestUpdates\Pages;

use App\Filament\Resources\LastestUpdates\LastestUpdateResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditLastestUpdate extends EditRecord
{
    protected static string $resource = LastestUpdateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
