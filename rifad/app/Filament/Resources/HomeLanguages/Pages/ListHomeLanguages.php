<?php

namespace App\Filament\Resources\HomeLanguages\Pages;

use App\Filament\Resources\HomeLanguages\HomeLanguageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeLanguages extends ListRecords
{
    protected static string $resource = HomeLanguageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
