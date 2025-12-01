<?php

namespace App\Filament\Resources\ReadingLevels\Pages;

use App\Filament\Resources\ReadingLevels\ReadingLevelResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewReadingLevel extends ViewRecord
{
    protected static string $resource = ReadingLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
