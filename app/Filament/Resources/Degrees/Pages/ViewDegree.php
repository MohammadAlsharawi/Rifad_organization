<?php

namespace App\Filament\Resources\Degrees\Pages;

use App\Filament\Resources\Degrees\DegreeResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDegree extends ViewRecord
{
    protected static string $resource = DegreeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
