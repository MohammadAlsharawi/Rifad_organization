<?php

namespace App\Filament\Resources\Labibs\Pages;

use App\Filament\Resources\Labibs\LabibResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditLabib extends EditRecord
{
    protected static string $resource = LabibResource::class;

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
