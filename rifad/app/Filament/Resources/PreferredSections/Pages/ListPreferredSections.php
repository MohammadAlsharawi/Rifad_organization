<?php

namespace App\Filament\Resources\PreferredSections\Pages;

use App\Filament\Resources\PreferredSections\PreferredSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPreferredSections extends ListRecords
{
    protected static string $resource = PreferredSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
