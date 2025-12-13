<?php

namespace App\Filament\Resources\VolunteerTypes\Pages;

use App\Filament\Resources\VolunteerTypes\VolunteerTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVolunteerTypes extends ListRecords
{
    protected static string $resource = VolunteerTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
