<?php

namespace App\Filament\Resources\ReadingLevels\Pages;

use App\Filament\Resources\ReadingLevels\ReadingLevelResource;
use Filament\Resources\Pages\CreateRecord;

class CreateReadingLevel extends CreateRecord
{
    protected static string $resource = ReadingLevelResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
