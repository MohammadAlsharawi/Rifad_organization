<?php

namespace App\Filament\Resources\ReadingLevels\Pages;

use App\Filament\Resources\ReadingLevels\ReadingLevelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListReadingLevels extends ListRecords
{
    protected static string $resource = ReadingLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
