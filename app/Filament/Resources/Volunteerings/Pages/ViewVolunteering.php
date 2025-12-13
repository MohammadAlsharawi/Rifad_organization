<?php

namespace App\Filament\Resources\Volunteerings\Pages;

use App\Filament\Resources\Volunteerings\VolunteeringResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewVolunteering extends ViewRecord
{
    protected static string $resource = VolunteeringResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
