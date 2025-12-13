<?php

namespace App\Filament\Resources\VolunteerTypes\Pages;

use App\Filament\Resources\VolunteerTypes\VolunteerTypeResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewVolunteerType extends ViewRecord
{
    protected static string $resource = VolunteerTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
