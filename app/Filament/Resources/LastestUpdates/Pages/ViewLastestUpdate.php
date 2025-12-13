<?php

namespace App\Filament\Resources\LastestUpdates\Pages;

use App\Filament\Resources\LastestUpdates\LastestUpdateResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLastestUpdate extends ViewRecord
{
    protected static string $resource = LastestUpdateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
