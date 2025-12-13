<?php

namespace App\Filament\Resources\Residences\Pages;

use App\Filament\Resources\Residences\ResidenceResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewResidence extends ViewRecord
{
    protected static string $resource = ResidenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
