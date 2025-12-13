<?php

namespace App\Filament\Resources\PreferredSections\Pages;

use App\Filament\Resources\PreferredSections\PreferredSectionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPreferredSection extends ViewRecord
{
    protected static string $resource = PreferredSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
