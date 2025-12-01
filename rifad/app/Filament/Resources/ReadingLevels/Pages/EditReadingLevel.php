<?php

namespace App\Filament\Resources\ReadingLevels\Pages;

use App\Filament\Resources\ReadingLevels\ReadingLevelResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditReadingLevel extends EditRecord
{
    protected static string $resource = ReadingLevelResource::class;

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
